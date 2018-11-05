<?php

use Illuminate\Database\Seeder;

class CoinSeeder extends Seeder
{
    public function run()
    {
        $coins = [10, 5, 2, 1];

        foreach ($coins as $item)
        {
            $coin = new \App\Coin();
            $coin->value = $item;
            $coin->save();
        }

        echo "Seed coin successfully. \n";
    }
}
