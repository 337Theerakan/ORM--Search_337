<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Register;
use App\Models\Student;
use App\Models\Course;

class RegisterFactory extends Factory
{
    protected $model = Register::class;

    public function definition()
    {
        return [
            'student_id' => Student::factory(),
            'course_id' => Course::factory(),
            'registration_date' => $this->faker->date,
            'status' => $this->faker->randomElement(['confirmed', 'canceled'])
        ];
    }
}
