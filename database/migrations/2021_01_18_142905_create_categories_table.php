<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatecategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('type');
            $table->integer('mainCategoryID');
            $table->string('name');
            $table->string('metaTitle');
            $table->string('metaDescription')->nullable();
            $table->string('metaKeywords')->nullable();
            $table->string('permalink');
            $table->integer('status')->default(0);
            $table->integer('hit')->default(0);
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
        Schema::dropIfExists('kategorilers');
    }
}
