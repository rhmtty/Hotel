<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEwalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ewallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amount');
            $table->string('partner_reff')->unique();
            $table->timestamp('expired');
            $table->string('retail_code');
            $table->string('ewallet_phone');
            $table->string('bill_title');
            $table->json('item_name')->nullable();
            $table->json('item_image_url')->nullable();
            $table->json('item_price')->nullable();
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
        Schema::dropIfExists('ewallets');
    }
}
