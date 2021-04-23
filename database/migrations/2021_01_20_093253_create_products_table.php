<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('categoryID');
            $table->string('name');
            $table->string('metaTitle');
            $table->string('metaDescription')->nullable();
            $table->string('metaKeywords')->nullable();
            $table->string('permalink');
            $table->double('price');
            $table->integer('stock');
            $table->integer('numberOfSales');
            $table->integer('amountPurchased');
            $table->integer('publish');
            $table->integer('status');
            $table->integer('hit');
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
