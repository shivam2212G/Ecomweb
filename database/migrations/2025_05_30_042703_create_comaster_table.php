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
        Schema::create('comaster', function (Blueprint $table) {
            $table->id('bill_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('mono');
            $table->string('addl1');
            $table->string('addl2');
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('total');
            $table->unsignedBigInteger('u_id');
            $table->foreign('u_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('comaster');
    }
};
