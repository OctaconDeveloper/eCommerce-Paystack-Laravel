<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('useremail');
            $table->string('orderID');
            $table->string('phone');
            $table->string('paymentType');
            $table->string('subAmount');
            $table->string('shipAmount');
            $table->string('totalAmount');
            $table->string('billinglastname');
            $table->string('billingfirstname');
            $table->string('billingcountry');
            $table->string('billingstreet');
            $table->string('billingcity');
            $table->string('billingstate');
            $table->string('billingcompany');
            $table->string('billingpostal');
            $table->string('shippinglastname');
            $table->string('shippingfirstname');
            $table->string('shippingcountry');
            $table->string('shippingstreet');
            $table->string('shippingcity');
            $table->string('shippingstate');
            $table->string('shippingcompany');
            $table->string('shippingpostal');
            $table->longText('orderDetails');
            $table->string('orderDate');
            $table->string('orderStatus');
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
        Schema::dropIfExists('orders');
    }
}
