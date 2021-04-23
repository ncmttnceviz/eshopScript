<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('categories')->insert([
           'type' => 0,
           'mainCategoryID' => 0,
           'name' => 'Test',
           'metaTitle' => 'Test',
           'permalink' => 'test'
       ]);
    }
}
