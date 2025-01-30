<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            // กำหนดค่าให้กับ fields ต่างๆ ของ Order
            'customer_id' => Customer::factory(),
            // สร้าง Customer โดยใช้ CustomerFactory
            'status' => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
            // สถานะการสั่งซื้อ: รอดำเนินการ, สำเร็จ, ยกเลิก
            'total_price' => $this->faker->randomFloat(2, 20, 500),
            // กำหนดราคารวมของใบสั่งซื้อ 20-500 บาท
        ];
    }
}
