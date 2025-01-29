<?php
// database/migrations/xxxx_xx_xx_create_room_types_table.php
// database/migrations/xxxx_xx_xx_create_rooms_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id(); // RoomID
            $table->string('room_number')->unique();
            $table->foreignId('room_type_id')->constrained('room_types')->onDelete('cascade');
            $table->enum('status', ['ว่าง', 'ไม่ว่าง', 'ระหว่างทำความสะอาด'])->default('ว่าง');
            $table->timestamp('last_update')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
