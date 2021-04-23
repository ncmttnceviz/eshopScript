<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_images')->insert([
           'productID' => 1,
           'path' => 'images/moderk-yeni-sezon-siyah-erkek-mont4758.jpg',
        ]);
    }
}
