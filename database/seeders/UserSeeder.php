<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Exécuter le seeder / تشغيل البذور
     * Run the database seeds
     */
    public function run(): void
    {
        // Super Administrateur / سوبر أدمن / Super Admin
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@dips-academy.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $superAdmin->assignRole('Super Admin');

        // Administrateur / مدير / Admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@dips-academy.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $admin->assignRole('Admin');

        // Instructeurs / المدرسون / Instructors
        $instructor1 = User::create([
            'name' => 'أحمد محمد',
            'email' => 'instructor1@dips-academy.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $instructor1->assignRole('Instructor');

        $instructor2 = User::create([
            'name' => 'فاطمة علي',
            'email' => 'instructor2@dips-academy.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $instructor2->assignRole('Instructor');

        // Étudiants / الطلاب / Students
        for ($i = 1; $i <= 10; $i++) {
            $student = User::create([
                'name' => "طالب {$i}",
                'email' => "student{$i}@dips-academy.com",
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);
            $student->assignRole('Student');
        }
    }
}
