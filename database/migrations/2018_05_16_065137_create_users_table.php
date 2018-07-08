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
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('plz')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->integer('customer_id')->unique();

            $table->string('remember_token')->nullable();
            $table->string('pwResetToken')->nullable();

            //Usertype
            $table->string('type')->default('default');

            //Email Verification
            $table->string('token')->nullable();
            //fuer Studienarbeit auf true gesetzt -> da wir keine Emails verschicken - normalerweise:false
            $table->boolean('verified')->default(true);


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
