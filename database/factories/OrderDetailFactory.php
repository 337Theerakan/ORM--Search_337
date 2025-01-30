<?php

namespace Database\Factories;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    public function definition(): array
    {
        return [
            // กำหนดค่าให้กับ fields ต่างๆ ของ OrderDetail
            'order_id' => Order::factory(),
            // สร้าง Order โดยใช้ OrderFactory
            'product_id' => Product::factory(),
            // สร้าง Product โดยใช้ ProductFactory
            'quantity' => $this->faker->numberBetween(1, 5),
            // กำหนดจำนวนสินค้าที่สั่งซื้อ 1-5 ชิ้น
            'price' => $this->faker->randomFloat(2, 10, 500),
            // กำหนดราคาสินค้า 10-500 บาท
        ];
    }
}
