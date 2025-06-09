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
        Schema::create('product', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_name',100);
            $table->string('product_image');
            $table->decimal('product_price', 10, 2);
            $table->string('product_description')->nullable();
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->references('cat_id')->on('category')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('product');
    }
};
