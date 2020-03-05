<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('last_name',32)->nullable();
            $table->string('first_name',32);
            $table->string('email',256)->unique();
            $table->string('password',256);
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('gender')->nullable()->comment("1-Male 2-Female");
            $table->date('birthday')->nullable()->comment("Y-m-d");
            $table->string('address',256)->nullable();
            $table->string('avatar',256)->nullable();
            $table->tinyInteger('role')->default(2)->comment("1-Manager 2-Staff");
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
