<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('option_id');

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('option_id')->references('id')->on('option');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_product');
    }
}
