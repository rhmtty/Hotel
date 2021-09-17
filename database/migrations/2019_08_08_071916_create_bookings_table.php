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
            $table->integer('id_kamar');
            $table->integer('id_pelanggan');
            $table->string('kode_bank')->nullable();
            $table->string('kode_produk')->nullable();
            $table->date('checkin_time');
            $table->date('checkout_time');
            $table->double('amount');
            $table->integer('lama_menginap');
            $table->integer('active');
            $table->integer('invoice');
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
