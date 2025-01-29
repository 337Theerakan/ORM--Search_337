<?php

// database/factories/RoomTypeFactory.php

namespace Database\Factories;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomTypeFactory extends Factory
{
    protected $model = RoomType::class;

    public function definition()
    {
        return [
            'type_name' => $this->faker->word,
            'price_per_night' => $this->faker->randomFloat(2, 50, 500),
            'description' => $this->faker->sentence,
        ];
    }
}
