<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('userID');
            $table->string('orderNumber');
            $table->integer('deliveryAddress');
            $table->integer('productID');
            $table->integer('numberOfProducts');
            $table->double('price');
            $table->double('totalPrice');
            $table->integer('status')->default(0);
            $table->string('shippingTrackingNumber')->nullable();
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
