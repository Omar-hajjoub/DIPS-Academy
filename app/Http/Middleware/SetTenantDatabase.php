<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\TenantDatabaseService;
use Symfony\Component\HttpFoundation\Response;

class SetTenantDatabase
{
    protected $tenantService;
    
    public function __construct(TenantDatabaseService $tenantService)
    {
        $this->tenantService = $tenantService;
    }
    
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // الحصول على المستخدم الحالي
        $user = $request->user();
        
        if ($user) {
            // التحقق من وجود قاعدة بيانات للمستخدم
            if (!$this->tenantService->tenantDatabaseExists($user->id)) {
                // إنشاء قاعدة بيانات جديدة إذا لم تكن موجودة
                $this->tenantService->createTenantDatabase($user->id);
            }
            
            // التبديل إلى قاعدة بيانات المستخدم
            $this->tenantService->switchToTenantDatabase($user->id);
        }
        
        $response = $next($request);
        
        // الرجوع إلى القاعدة الرئيسية بعد انتهاء الطلب
        if ($user) {
            $this->tenantService->switchToMainDatabase();
        }
        
        return $response;
    }
}
