<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class SalesSystemController extends Controller
{
    public function index()
    {
        // แสดงข้อมูลลูกค้าทั้งหมด
        Log::debug('Sales System index is called.');

        // ดึงข้อมูลลูกค้าทั้งหมด
        $customers = Customer::all();
        // ดึงข้อมูลสินค้าทั้งหมด

        $products = Product::all();
        // ดึงข้อมูลใบสั่งซื้อทั้งหมด

        $orders = Order::with('orderDetails.product')->get();
        // นับจำนวนใบสั่งซื้อของลูกค้าแต่ละคน

        $customerOrderCount = $customers->map(function ($customer) {
            return [
                'customer_id' => $customer->id,
                'name' => $customer->name,
                'order_count' => $customer->orders()->count(),
            ];
        });

        Log::debug('Data being sent to Inertia:', [
            'customers_count' => $customers->count(),
            'products_count' => $products->count(),
            'orders_count' => $orders->count(),
            'customerOrderCount' => $customerOrderCount->toArray(),
        ]);

        // ส่งข้อมูลไปแสดงผลที่หน้า SalesSystem/Index

        return Inertia::render('SalesSystem/Index', [
            'customers' => $customers,
            'products' => $products,
            'orders' => $orders,
            'customerOrderCount' => $customerOrderCount,
        ]);
    }
}

