<?php

// database/migrations/xxxx_xx_xx_create_room_types_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTypesTable extends Migration
{
    public function up()
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->id(); // RoomTypeID
            $table->string('type_name');
            $table->decimal('price_per_night', 10, 2);
            $table->text('description')->nullable();
            $table->timestamp('last_update')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_types');
    }
}
