<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('priceCategory');
            $table->text('description');
            $table->integer('x');
            $table->integer('y');
            $table->boolean('available');

            $table->integer('event_id')->unsigned()->nullable();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->integer('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}