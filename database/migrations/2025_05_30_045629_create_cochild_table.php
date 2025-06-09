<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cochild', function (Blueprint $table) {
            $table->id('cochild_id');
            $table->unsignedBigInteger('bill_id');
            $table->foreign('bill_id')->references('bill_id')->on('comaster')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('cart_data');
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
        Schema::dropIfExists('cochild');
    }
};
