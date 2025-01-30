<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;
use App\Models\Teacher;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'course_name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'credit_hours' => $this->faker->numberBetween(1, 5),
            'teacher_id' => Teacher::factory() // สร้างอาจารย์อัตโนมัติ
        ];
    }
}
