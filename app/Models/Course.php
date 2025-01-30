<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Course.php
class Course extends Model
{
    use HasFactory;
    protected $fillable = ['course_name', 'description', 'credit_hours', 'teacher_id'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function registers()
    {
        return $this->hasMany(Register::class);
    }
}
