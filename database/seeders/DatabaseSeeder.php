<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            \Database\Seeders\AdminRoleTable::class,
            \Database\Seeders\AdminTable::class,
            \Database\Seeders\SellerTableSeeder::class
        ]);
    }
}