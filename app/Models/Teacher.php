<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory; // เพิ่ม trait นี้

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'department'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
