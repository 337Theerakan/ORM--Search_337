<?php

// app/Models/Booking.php

// app/Models/Booking.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_room_id',
        'room_id',
        'check_in_date',
        'check_out_date',
        'total_price',
        'status',
        'booking_date',
    ];

    public function customerRoom()
    {
        return $this->belongsTo(CustomerRoom::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
