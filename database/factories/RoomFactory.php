<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition()
    {
        return [
            'room_number' => $this->faker->unique()->numberBetween(100, 999),
            'room_type_id' => \App\Models\RoomType::factory(),
            'status' => $this->faker->randomElement(['ว่าง', 'ไม่ว่าง', 'ระหว่างทำความสะอาด']),
        ];
    }
}
