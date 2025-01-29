<?php

// database/factories/BookingFactory.php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'customer_room_id' => \App\Models\CustomerRoom::factory(),
            'room_id' => \App\Models\Room::factory(),
            'check_in_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'check_out_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'total_price' => $this->faker->randomFloat(2, 100, 1000),
            'status' => $this->faker->randomElement(['ยืนยัน', 'ยกเลิก']),
            'booking_date' => $this->faker->dateTimeThisYear(),
        ];
    }
}
