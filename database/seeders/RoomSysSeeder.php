<?php

namespace Database\Seeders;

// database/seeders/RoomSysSeeder.php

use Illuminate\Database\Seeder;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\Booking;
use App\Models\CustomerRoom;
use Illuminate\Support\Str;

class RoomSysSeeder extends Seeder
{
    public function run()
    {
        // ตรวจสอบว่ามีข้อมูลอยู่แล้วหรือไม่ก่อนที่จะสร้างใหม่
        if (!\App\Models\User::where('email', 'unique_test@example.com')->exists()) {
            \App\Models\User::create([
                'name' => 'Test User',
                'email' => 'unique_test@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            ]);
        }

        // สร้างข้อมูลตัวอย่าง
        \App\Models\RoomType::factory(10)->create()->each(function ($roomType) {
            \App\Models\Room::factory(5)->create(['room_type_id' => $roomType->id])->each(function ($room) {
                \App\Models\Booking::factory(3)->create(['room_id' => $room->id]);
            });
        });
    }
}
