<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddmoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addmore', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('order_id');
            $table->Integer('category_id');
            $table->Integer('product_id');
            $table->Integer('quantity');
            $table->Integer('price');
            $table->Integer('total');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addmore');
    }
}
