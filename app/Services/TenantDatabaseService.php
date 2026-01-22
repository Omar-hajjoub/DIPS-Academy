<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;

class TenantDatabaseService
{
    /**
     * إنشاء قاعدة بيانات جديدة لمستخدم معين
     */
    public function createTenantDatabase(string $userId): bool
    {
        try {
            $dbName = $this->getTenantDatabaseName($userId);
            
            // إنشاء قاعدة البيانات
            DB::statement("CREATE DATABASE IF NOT EXISTS `{$dbName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            
            // إضافة الاتصال الجديد
            $this->addTenantConnection($dbName);
            
            // تشغيل Migrations على قاعدة البيانات الجديدة
            $this->runMigrations($dbName);
            
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
    
    /**
     * الحصول على اسم قاعدة بيانات المستخدم
     */
    public function getTenantDatabaseName(string $userId): string
    {
        return 'dips_user_' . $userId;
    }
    
    /**
     * إضافة اتصال قاعدة بيانات جديد
     */
    public function addTenantConnection(string $dbName): void
    {
        Config::set("database.connections.tenant_{$dbName}", [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => $dbName,
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ]);
    }
    
    /**
     * تشغيل Migrations على قاعدة بيانات معينة
     */
    public function runMigrations(string $dbName): void
    {
        // تعيين قاعدة البيانات المؤقتة
        Config::set('database.connections.tenant_temp', [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => $dbName,
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ]);
        
        // تشغيل Migrations
        Artisan::call('migrate', [
            '--database' => 'tenant_temp',
            '--force' => true,
        ]);
    }
    
    /**
     * التبديل إلى قاعدة بيانات مستخدم معين
     */
    public function switchToTenantDatabase(string $userId): void
    {
        $dbName = $this->getTenantDatabaseName($userId);
        $this->addTenantConnection($dbName);
        
        Config::set('database.default', "tenant_{$dbName}");
        DB::purge("tenant_{$dbName}");
        DB::reconnect("tenant_{$dbName}");
    }
    
    /**
     * الرجوع إلى قاعدة البيانات الرئيسية
     */
    public function switchToMainDatabase(): void
    {
        Config::set('database.default', 'mysql');
        DB::purge('mysql');
        DB::reconnect('mysql');
    }
    
    /**
     * مزامنة البيانات من قاعدة بيانات المستخدم إلى القاعدة الرئيسية
     */
    public function syncToMainDatabase(string $userId, array $tables = []): bool
    {
        try {
            $dbName = $this->getTenantDatabaseName($userId);
            
            // إذا لم يتم تحديد جداول، استخدم جميع الجداول
            if (empty($tables)) {
                $tables = $this->getTables($dbName);
            }
            
            foreach ($tables as $table) {
                $this->syncTable($dbName, $table, $userId);
            }
            
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
    
    /**
     * الحصول على جميع الجداول في قاعدة البيانات
     */
    private function getTables(string $dbName): array
    {
        $this->addTenantConnection($dbName);
        $tables = DB::connection("tenant_{$dbName}")
            ->select("SHOW TABLES");
        
        $tableNames = [];
        foreach ($tables as $table) {
            $tableKey = "Tables_in_{$dbName}";
            $tableNames[] = $table->$tableKey;
        }
        
        return $tableNames;
    }
    
    /**
     * مزامنة جدول واحد
     */
    private function syncTable(string $dbName, string $table, string $userId): void
    {
        // الحصول على البيانات من قاعدة بيانات المستخدم
        $this->addTenantConnection($dbName);
        $data = DB::connection("tenant_{$dbName}")
            ->table($table)
            ->get()
            ->toArray();
        
        // إضافة user_id لكل سجل
        foreach ($data as &$record) {
            $record = (array) $record;
            $record['tenant_user_id'] = $userId;
        }
        
        // التبديل إلى القاعدة الرئيسية
        $this->switchToMainDatabase();
        
        // إدراج أو تحديث البيانات في القاعدة الرئيسية
        foreach ($data as $record) {
            DB::table($table)->updateOrInsert(
                ['id' => $record['id'], 'tenant_user_id' => $userId],
                $record
            );
        }
    }
    
    /**
     * التحقق من وجود قاعدة بيانات للمستخدم
     */
    public function tenantDatabaseExists(string $userId): bool
    {
        $dbName = $this->getTenantDatabaseName($userId);
        $result = DB::select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?", [$dbName]);
        
        return !empty($result);
    }
    
    /**
     * حذف قاعدة بيانات المستخدم
     */
    public function deleteTenantDatabase(string $userId): bool
    {
        try {
            $dbName = $this->getTenantDatabaseName($userId);
            DB::statement("DROP DATABASE IF EXISTS `{$dbName}`");
            
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
}
