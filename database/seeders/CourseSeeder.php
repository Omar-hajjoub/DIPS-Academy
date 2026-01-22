<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $instructors = User::role('Instructor')->get();

        if ($instructors->isEmpty()) {
            $this->command->warn('No instructors found. Please run UserSeeder first.');
            return;
        }

        $courses = [
            [
                'title' => 'تعلم Laravel من الصفر إلى الاحتراف',
                'description' => 'دورة شاملة لتعلم إطار عمل Laravel من الأساسيات إلى المستوى المتقدم',
                'short_description' => 'دورة Laravel كاملة للمبتدئين والمحترفين',
                'price' => 299.99,
                'discount_price' => 199.99,
                'level' => 'beginner',
                'duration_hours' => 40,
                'what_you_will_learn' => 'تعلم Laravel, بناء تطبيقات ويب, قواعد البيانات, API',
                'requirements' => 'معرفة أساسية بـ PHP',
            ],
            [
                'title' => 'Vue.js 3 - التطوير الحديث',
                'description' => 'تعلم Vue.js 3 مع Composition API وبناء تطبيقات حديثة',
                'short_description' => 'دورة Vue.js 3 للمطورين',
                'price' => 249.99,
                'level' => 'intermediate',
                'duration_hours' => 30,
                'what_you_will_learn' => 'Vue.js 3, Composition API, Vue Router, Pinia',
                'requirements' => 'معرفة HTML, CSS, JavaScript',
            ],
            [
                'title' => 'DevOps مع Docker و Kubernetes',
                'description' => 'تعلم DevOps من الصفر مع Docker و Kubernetes',
                'short_description' => 'دورة DevOps شاملة',
                'price' => 399.99,
                'level' => 'advanced',
                'duration_hours' => 50,
                'what_you_will_learn' => 'Docker, Kubernetes, CI/CD, Cloud',
                'requirements' => 'خبرة في Linux و Command Line',
            ],
        ];

        foreach ($courses as $courseData) {
            $course = Course::create(array_merge($courseData, [
                'instructor_id' => $instructors->random()->id,
                'status' => 'published',
            ]));

            // Create lessons for each course
            $lessons = [
                ['title' => 'مقدمة الدورة', 'duration_minutes' => 15, 'is_preview' => true, 'order' => 1],
                ['title' => 'الإعداد والتهيئة', 'duration_minutes' => 30, 'is_preview' => false, 'order' => 2],
                ['title' => 'الأساسيات', 'duration_minutes' => 45, 'is_preview' => false, 'order' => 3],
                ['title' => 'المستوى المتوسط', 'duration_minutes' => 60, 'is_preview' => false, 'order' => 4],
                ['title' => 'مشروع عملي', 'duration_minutes' => 90, 'is_preview' => false, 'order' => 5],
            ];

            foreach ($lessons as $lessonData) {
                Lesson::create(array_merge($lessonData, [
                    'course_id' => $course->id,
                    'type' => 'video',
                    'description' => 'وصف الدرس',
                    'content' => 'محتوى الدرس الكامل',
                ]));
            }

            $course->update(['lessons_count' => count($lessons)]);
        }
    }
}
