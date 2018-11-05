<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Coin extends Model
{
    public $timestamps = false;

    public static function getTotal()
    {
        return Coin::where('amount', '>', 0)->sum(DB::raw('value * amount'));
    }
}
