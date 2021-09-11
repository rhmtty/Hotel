<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_id');
            $table->string('customer_name');
            $table->string('username')->unique();
            $table->string('pin')->nullable();
            $table->string('customer_phone');
            $table->string('customer_email')->unique();
            $table->bigInteger('no_ktp')->unsigned();
            $table->text('customer_address');
            $table->string('password');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
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
        Schema::dropIfExists('pelanggan');
    }
}
