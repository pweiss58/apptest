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
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email');
            $table->string('password');
            $table->timestamps();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('plz')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->integer('customer_id')->unique();
            $table->string('remember_token')->nullable();

           /* $table->integer('location_id')->unsigned()->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');*/

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
