<?php
// database/migrations/xxxx_xx_xx_create_customer_rooms_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerRoomsTable extends Migration
{
    public function up()
{
    Schema::create('customer_rooms', function (Blueprint $table) {
        $table->id();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('phone_number');
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('customer_rooms');
    }
}
