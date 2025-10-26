<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SellerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sellers')->insert([
            'f_name' => 'alimrun',
            'l_name' => 'khandakar',
            'phone' => '01759412381',
            'email' => 'seller@seller.com',
            'image' => 'def.png',
            'password' => bcrypt(12345678),
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
