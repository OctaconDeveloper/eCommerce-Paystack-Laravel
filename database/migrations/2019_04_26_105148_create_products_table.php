<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('productID');
            $table->string('categoryID');
            $table->string('brandID');
            $table->string('userID');
            $table->string('productName');
            $table->string('productPrice');
            $table->string('oldPrice');
            $table->longText('productDetails');
            $table->longText('productInfo');
            $table->string('thumb1');
            $table->string('thumb2');
            $table->string('thumb3');
            $table->string('thumb4');
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
        Schema::dropIfExists('products');
    }
}
