<?php

// app/Models/CustomerRoom.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

