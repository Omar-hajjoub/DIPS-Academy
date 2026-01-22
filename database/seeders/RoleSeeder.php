<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Exécuter le seeder / تشغيل البذور
     * Run the database seeds
     */
    public function run(): void
    {
        // Réinitialiser les rôles et permissions en cache
        // إعادة تعيين الأدوار والصلاحيات المخزنة مؤقتاً
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Créer les permissions / إنشاء الصلاحيات / Create permissions
        $permissions = [
            // Cours / الدورات / Courses
            'view courses',
            'create courses',
            'edit courses',
            'delete courses',
            'publish courses',
            
            // Leçons / الدروس / Lessons
            'view lessons',
            'create lessons',
            'edit lessons',
            'delete lessons',
            
            // Inscriptions / التسجيلات / Enrollments
            'view enrollments',
            'create enrollments',
            'edit enrollments',
            'delete enrollments',
            
            // Certificats / الشهادات / Certificates
            'view certificates',
            'create certificates',
            'delete certificates',
            
            // Évaluations / التقييمات / Reviews
            'view reviews',
            'create reviews',
            'edit reviews',
            'delete reviews',
            'approve reviews',
            
            // Quiz / الاختبارات / Quizzes
            'view quizzes',
            'create quizzes',
            'edit quizzes',
            'delete quizzes',
            'take quizzes',
            
            // Utilisateurs / المستخدمون / Users
            'view users',
            'create users',
            'edit users',
            'delete users',
            
            // Administration / الإدارة / Admin
            'access admin panel',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }

        // Créer les rôles / إنشاء الأدوار / Create roles
        $superAdmin = Role::create(['name' => 'Super Admin', 'guard_name' => 'web']);
        $superAdmin->givePermissionTo(Permission::all());

        $admin = Role::create(['name' => 'Admin', 'guard_name' => 'web']);
        $admin->givePermissionTo([
            'view courses', 'create courses', 'edit courses', 'delete courses', 'publish courses',
            'view lessons', 'create lessons', 'edit lessons', 'delete lessons',
            'view enrollments', 'view certificates',
            'view reviews', 'approve reviews',
            'view quizzes', 'create quizzes', 'edit quizzes', 'delete quizzes',
            'view users', 'create users', 'edit users',
            'access admin panel',
        ]);

        $instructor = Role::create(['name' => 'Instructor', 'guard_name' => 'web']);
        $instructor->givePermissionTo([
            'view courses', 'create courses', 'edit courses', 'publish courses',
            'view lessons', 'create lessons', 'edit lessons', 'delete lessons',
            'view enrollments',
            'view reviews',
            'view quizzes', 'create quizzes', 'edit quizzes', 'delete quizzes',
        ]);

        $student = Role::create(['name' => 'Student', 'guard_name' => 'web']);
        $student->givePermissionTo([
            'view courses',
            'view lessons',
            'create enrollments',
            'view certificates',
            'create reviews',
            'view quizzes', 'take quizzes',
        ]);
    }
}
