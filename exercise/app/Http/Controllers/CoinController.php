<?php

namespace App\Http\Controllers;

use App\Coin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoinController extends Controller
{
    public function insertCoin(Request $request)
    {
        $validator = $this->validatorCoin($request->all());

        if ($validator->fails()){
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }

        $coin = Coin::where('value', $request->input('coin_value'))->increment('amount');

        return redirect()->route('home');
    }

    private function validatorCoin($data = [])
    {
        return Validator::make($data, [
            'coin_value' => 'required|numeric|min:1'
        ]);
    }

}