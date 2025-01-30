<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalesSystemSeeder extends Seeder
{
    public function run(): void
    {

        Product::factory(50)->create();
//         สร้างข้อมูลสินค้า 50 รายการ
        Customer::factory(10)->create()->each(function ($customer) {
            // สร้างข้อมูลลูกค้า 10 คน และสร้างข้อมูลใบสั่งซื้อ 2 ใบสำหรับลูกค้าแต่ละคน
            Order::factory(2)->create(['customer_id' => $customer->id])->each(function ($order) {

                $orderDetails = OrderDetail::factory(3)->create(['order_id' => $order->id])->each(function ($detail) {
                    $detail->update(['product_id' => Product::inRandomOrder()->first()->id]);
                    // สร้างข้อมูลรายการสินค้า 3 รายการ สำหรับใบสั่งซื้อแต่ละใบ โดยสุ่มสินค้าจาก Product
                    // ที่มีอยู่ และกำหนดราคาและจำนวนสินค้าที่สั่งซื้อ และคำนวณราคารวมของใบสั่งซื้อ และสินค้าแต่ละรายการ และสินค้าทั้งหมด
                });
                $order->update(['total_price' => $orderDetails->sum(fn ($detail) => $detail->quantity * $detail->price)]);
           // คำนวณราคารวมของใบสั่งซื้อ และสินค้าแต่ละรายการ และสินค้าทั้งหมด 
            });
        });
    }
}

// php artisan db:seed --class=SalesSystemSeeder
