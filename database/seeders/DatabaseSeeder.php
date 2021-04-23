<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BannersSeeder::class,
            AdminSeeder::class,
            SiteConfigSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ProductImagesSeeder::class
        ]);
    }
}
