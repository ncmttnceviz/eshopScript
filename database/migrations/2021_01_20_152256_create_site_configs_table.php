<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_configs', function (Blueprint $table) {
            $table->id();
            $table->string('siteName');
            $table->string('siteTitle');
            $table->string('SiteDescription');
            $table->string('SiteKeywords');
            $table->string('address');
            $table->string('phoneNumber');
            $table->string('logo');
            $table->string('mailAddress');
            $table->string('mailHost');
            $table->integer('mailSmtpPort');
            $table->string('mailEncryption');
            $table->string('mailUser');
            $table->string('mailPassword');
            $table->string('SocialFacebook');
            $table->string('SocialTwitter');
            $table->string('SocialInstagram');
            $table->string('SocialPinterest');
            $table->string('language');
            $table->text('aboutus');
            $table->text('termsConditions');
            $table->text('privacyPolicy');
            $table->integer('shippingPrice');
            $table->integer('freeShippingThreshold');
            $table->string('paymentApi');
            $table->string('paymentSecretKey');
            $table->string('paymentBaseUrl');
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
        Schema::dropIfExists('site_configs');
    }
}
