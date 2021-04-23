<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_configs')->insert([
            'siteName' => 'Eshop',
            'siteTitle' => 'Laravel E-Commerce Script',
            'SiteDescription' => 'Laravel E-Commerce Script',
            'SiteKeywords' => 'Laravel E-Commerce Script',
            'address' => 'Yücetepe, Akdeniz Cd. No:31, 06570 Çankaya/Ankara',
            'phoneNumber' => 0000000000,
            'logo' => 'images/logox.png'
        ]);
    }
}
