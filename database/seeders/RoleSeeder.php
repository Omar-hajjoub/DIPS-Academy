<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            // Courses
            'view courses',
            'create courses',
            'edit courses',
            'delete courses',
            'publish courses',
            
            // Lessons
            'view lessons',
            'create lessons',
            'edit lessons',
            'delete lessons',
            
            // Enrollments
            'view enrollments',
            'create enrollments',
            'edit enrollments',
            'delete enrollments',
            
            // Certificates
            'view certificates',
            'create certificates',
            'delete certificates',
            
            // Reviews
            'view reviews',
            'create reviews',
            'edit reviews',
            'delete reviews',
            'approve reviews',
            
            // Quizzes
            'view quizzes',
            'create quizzes',
            'edit quizzes',
            'delete quizzes',
            'take quizzes',
            
            // Users
            'view users',
            'create users',
            'edit users',
            'delete users',
            
            // Admin
            'access admin panel',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles
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
