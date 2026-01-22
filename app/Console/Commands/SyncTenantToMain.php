<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\TenantDatabaseService;

class SyncTenantToMain extends Command
{
    protected $signature = 'tenant:sync {user_id : معرف المستخدم} {--tables=* : الجداول المراد مزامنتها}';
    
    protected $description = 'مزامنة بيانات المستخدم من قاعدته الخاصة إلى القاعدة الرئيسية';
    
    public function handle(TenantDatabaseService $service)
    {
        $userId = $this->argument('user_id');
        $tables = $this->option('tables');
        
        if (!$service->tenantDatabaseExists($userId)) {
            $this->error("قاعدة البيانات غير موجودة للمستخدم: {$userId}");
            return 1;
        }
        
        $this->info("جاري مزامنة البيانات للمستخدم: {$userId}");
        
        if ($service->syncToMainDatabase($userId, $tables)) {
            $this->info("✅ تمت المزامنة بنجاح");
        } else {
            $this->error("❌ فشلت المزامنة");
            return 1;
        }
        
        return 0;
    }
}
