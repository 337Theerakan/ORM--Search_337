<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Course;
use App\Models\Register;

class StudentRegistrationSeeder extends Seeder
{
    public function run()
    {
        // สร้างอาจารย์ 10 คน
        $teachers = Teacher::factory(10)->create();

        // สร้างหลักสูตร 20 หลักสูตร และสุ่มอาจารย์ที่สร้างขึ้น
        $courses = Course::factory(20)->create([
            'teacher_id' => $teachers->random()->id
        ]);

        // สร้างนักศึกษา 50 คน
        $students = Student::factory(50)->create();

        // ลงทะเบียนสุ่ม 100 รายการ
        Register::factory(100)->create([
            'student_id' => $students->random()->id,
            'course_id' => $courses->random()->id
        ]);
    }
}

// // php artisan db:seed --class=StudentRegistrationSeeder
