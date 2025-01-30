<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class; // ต้องระบุ model

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            // สร้างชื่อสินค้าแบบสุ่ม 1 คำ โดยใช้ faker->word
            'description' => $this->faker->sentence,
            // สร้างคำอธิบายสินค้าแบบสุ่ม 1 ประโยค โดยใช้ faker->sentence
            'price' => $this->faker->randomFloat(2, 1, 100),
            'stock' => $this->faker->numberBetween(1, 100),
        ];
    }
}
