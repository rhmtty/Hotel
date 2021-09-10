<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAktivitasKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aktivitas_karyawan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_karyawan', 255)->nullabe();
            $table->string('info_karyawan', 500);
            $table->string('aktivitas', 500);
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
        Schema::dropIfExists('aktivitas_karyawan');
    }
}
