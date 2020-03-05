<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code',5)->unique();
            $table->string('name',32);
            $table->text('description')->nullable();
            $table->bigInteger('price');
            $table->tinyInteger('category')->comment("1-Mouse 2-Keyboard 3-Laptop 4-Case 5-Screen 6-Camera 7-Phone");
            $table->tinyInteger('status')->default(1)->comment("1-Trong kho 2-Đang sử dụng 3-Thanh lý");
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
