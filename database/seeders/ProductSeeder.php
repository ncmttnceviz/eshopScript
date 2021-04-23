<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'categoryID' => 1,
            'name' => 'Test Product',
            'metaTitle' => 'Test Product',
            'permalink' => 'test-product',
            'price' => '10.00',
            'stock' => 10,
            'numberOfSales' => 0,
            'amountPurchased' => 0,
            'publish' => 1,
            'status' => 1
        ]);
    }
}
