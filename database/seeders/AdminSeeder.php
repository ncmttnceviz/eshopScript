<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'surname' => 'Admin',
            'email' => 'admin@admin.com',
            'permission' => 1,
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('rootadmin')
        ]);
    }
}
