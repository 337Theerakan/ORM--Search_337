<?php

// database/factories/CustomerRoomFactory.php

namespace Database\Factories;

use App\Models\CustomerRoom;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerRoomFactory extends Factory
{
    protected $model = CustomerRoom::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone_number' => $this->faker->phoneNumber,
        ];
    }
}
