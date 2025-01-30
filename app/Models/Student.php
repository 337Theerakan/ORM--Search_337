<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Student.php
// app/Models/Student.php
class Student extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone',
        'date_of_birth', 'enrollment_year', 'gender'
    ];

    public function registers()
    {
        return $this->hasMany(Register::class);
    }
}
