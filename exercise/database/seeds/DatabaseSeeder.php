<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CoinSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
