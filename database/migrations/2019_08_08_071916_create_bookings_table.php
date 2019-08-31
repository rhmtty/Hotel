<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_kamar')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->integer('id_pelanggan')->unsigned();
            $table->date('checkin_time')->nullable();
            $table->date('checkout_time')->nullable();
            $table->double('total');
            $table->integer('lama_menginap');
            $table->string('keterangan');
            $table->integer('active');
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
        Schema::dropIfExists('bookings');
    }
}
