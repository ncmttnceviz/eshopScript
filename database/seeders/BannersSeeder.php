<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            'mainBanner' => 'images/mainBanner.jpg',
            'mainBannerTitle' => 'Title',
            'mainBannerText' => 'Text',
            'mainBannerRoute' => 0,
            'mainBannerLink' => 0,
            'topBannerOne' => 'images/topBannerOne.webp',
            'topBannerOneTitle' => 'Title',
            'topBannerOneText' => 'Text',
            'topBannerOneRoute' => 0,
            'topBannerOneLink' => 0,
            'topBannerTwo' => 'images/topBannerTwo.webp',
            'topBannerTwoTitle' => 'Title',
            'topBannerTwoText' => 'Text',
            'topBannerTwoRoute' => 0,
            'topBannerTwoLink' => 0,
            'topBannerThree' => 'images/topBannerThree.webp',
            'topBannerThreeTitle' => 'Title',
            'topBannerThreeText' => 'Text',
            'topBannerThreeRoute' => 0,
            'topBannerThreeLink' => 0,
            'midBannerOne' => 'images/midBannerOne.webp',
            'midBannerOneTitle' => 'Title',
            'midBannerOneText' => 'Text',
            'midBannerOneRoute' => 0,
            'midBannerOneLink' => 0,
            'midBannerTwo' => 'images/midBannerTwo.webp',
            'midBannerTwoTitle' => 'Title',
            'midBannerTwoText' => 'Text',
            'midBannerTwoRoute' => 0,
            'midBannerTwoLink' => 0,
        ]);
    }
}
