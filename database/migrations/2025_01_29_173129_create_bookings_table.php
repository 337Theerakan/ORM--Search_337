<?php
// database/migrations/xxxx_xx_xx_create_bookings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('bookings')) {
            Schema::create('bookings', function (Blueprint $table) {
                $table->id(); // BookingID
                $table->foreignId('customer_room_id')->constrained('customer_rooms')->onDelete('cascade');
                // ฟิลด์อื่นๆ ของตาราง bookings
                $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
                $table->date('check_in_date');
                $table->date('check_out_date');
                $table->decimal('total_price', 10, 2);
                $table->enum('status', ['ยืนยัน', 'ยกเลิก'])->default('ยืนยัน');
                $table->timestamp('booking_date')->useCurrent();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
