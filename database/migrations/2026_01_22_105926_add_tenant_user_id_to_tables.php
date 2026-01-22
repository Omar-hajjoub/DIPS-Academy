<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécuter les migrations / تشغيل الترحيلات
     * Run the migrations
     */
    public function up(): void
    {
        // Ajouter le champ tenant_user_id à toutes les tables principales
        // إضافة حقل tenant_user_id لجميع الجداول الرئيسية
        $tables = [
            'courses',
            'lessons',
            'enrollments',
            'certificates',
            'reviews',
            'quizzes',
            'quiz_questions',
            'quiz_attempts',
            'lesson_progress',
        ];

        foreach ($tables as $tableName) {
            if (Schema::hasTable($tableName) && !Schema::hasColumn($tableName, 'tenant_user_id')) {
                Schema::table($tableName, function (Blueprint $table) {
                    $table->string('tenant_user_id')->nullable()->after('id');
                    $table->index('tenant_user_id');
                });
            }
        }
    }

    /**
     * Inverser les migrations / عكس الترحيلات
     * Reverse the migrations
     */
    public function down(): void
    {
        $tables = [
            'courses',
            'lessons',
            'enrollments',
            'certificates',
            'reviews',
            'quizzes',
            'quiz_questions',
            'quiz_attempts',
            'lesson_progress',
        ];

        foreach ($tables as $tableName) {
            if (Schema::hasTable($tableName) && Schema::hasColumn($tableName, 'tenant_user_id')) {
                Schema::table($tableName, function (Blueprint $table) use ($tableName) {
                    $table->dropIndex([$tableName . '_tenant_user_id_index']);
                    $table->dropColumn('tenant_user_id');
                });
            }
        }
    }
};
