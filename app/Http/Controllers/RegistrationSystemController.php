<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Course;
use App\Models\Register;

class RegistrationSystemController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        $students = Student::all();
        $courses = Course::with('teacher')->get();
        $registers = Register::with(['student', 'course'])->get();

        return response()->json([
            'status' => 'success',
            'data' => [
                'teachers' => $teachers,
                'students' => $students,
                'courses' => $courses,
                'registers' => $registers,
            ]
        ]);
    }
}
