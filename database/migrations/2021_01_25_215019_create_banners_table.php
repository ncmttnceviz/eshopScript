<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('mainBanner');
            $table->string('mainBannerTitle');
            $table->string('mainBannerText');
            $table->integer('mainBannerRoute');
            $table->string('mainBannerLink');
            $table->string('topBannerOne');
            $table->string('topBannerOneTitle');
            $table->string('topBannerOneText');
            $table->integer('topBannerOneRoute');
            $table->string('topBannerOneLink');
            $table->string('topBannerTwo');
            $table->string('topBannerTwoTitle');
            $table->string('topBannerTwoText');
            $table->integer('topBannerTwoRoute');
            $table->string('topBannerTwoLink');
            $table->string('topBannerThree');
            $table->string('topBannerThreeTitle');
            $table->string('topBannerThreeText');
            $table->integer('topBannerThreeRoute');
            $table->string('topBannerThreeLink');
            $table->string('midBannerOne');
            $table->string('midBannerOneTitle');
            $table->string('midBannerOneText');
            $table->integer('midBannerOneRoute');
            $table->string('midBannerOneLink');
            $table->string('midBannerTwo');
            $table->string('midBannerTwoTitle');
            $table->string('midBannerTwoText');
            $table->integer('midBannerTwoRoute');
            $table->string('midBannerTwoLink');

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
        Schema::dropIfExists('banners');
    }
}
