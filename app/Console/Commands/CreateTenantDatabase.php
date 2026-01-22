<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\TenantDatabaseService;

class CreateTenantDatabase extends Command
{
    protected $signature = 'tenant:create {user_id : معرف المستخدم}';
    
    protected $description = 'إنشاء قاعدة بيانات جديدة لمستخدم معين';
    
    public function handle(TenantDatabaseService $service)
    {
        $userId = $this->argument('user_id');
        
        $this->info("جاري إنشاء قاعدة بيانات للمستخدم: {$userId}");
        
        if ($service->tenantDatabaseExists($userId)) {
            $this->warn("قاعدة البيانات موجودة بالفعل!");
            
            if (!$this->confirm('هل تريد إعادة إنشائها؟')) {
                return 0;
            }
            
            $service->deleteTenantDatabase($userId);
        }
        
        if ($service->createTenantDatabase($userId)) {
            $dbName = $service->getTenantDatabaseName($userId);
            $this->info("✅ تم إنشاء قاعدة البيانات بنجاح: {$dbName}");
        } else {
            $this->error("❌ فشل إنشاء قاعدة البيانات");
            return 1;
        }
        
        return 0;
    }
}
