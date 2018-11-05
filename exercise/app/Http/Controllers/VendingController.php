<?php

namespace App\Http\Controllers;

use App\Coin;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendingController extends Controller
{
    public function showCoin()
    {
        $data['coins'] = Coin::all();
        $data['total'] = Coin::getTotal();

        return view('index', $data);
    }

    public function selectProduct(Request $request)
    {
        $validator = $this->validatorItem($request->all());

        if ($validator->fails()){
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }

        $fund = Coin::getTotal();
        $product = Product::find($request->input('product_id'));

        if ($product == null){
            return redirect()->back()->withInput($request->all())->withErrors(['product_id' => ['Product not found.']]);
        }

        $this->clearCoin();
        $data['item'] = null;
        $change = $fund - $product->price;

        if ($product->in_stock == 0 || $change < 0){
            //return got item false. product isn't available
            $data['total'] = Coin::getTotal();
            $data['coins'] = Coin::all();
        }
        else{
            $data['coins'] = $this->change($change);
            $data['total'] = Coin::getTotal();
            $data['item'] = $product;
            $this->clearCoin();
        }

        return view('result', $data);
    }

    public function refund()
    {
        $data['total'] = Coin::getTotal();
        $data['coins'] = Coin::all();
        $data['item'] = null;
        $this->clearCoin();

        return view('result', $data);
    }

    private function change($fund = 0)
    {
        $coins = Coin::orderByDesc('value')->get();
        foreach ($coins as $coin){
            $coin->amount = floor($fund / $coin->value);
            $coin->save();
            $fund = $fund % $coin->value;
        }

        return $coins;
    }

    private function validatorItem($data = [])
    {
        return Validator::make($data, [
            'product_id' => 'required|numeric|min:1'
        ]);
    }

    private function clearCoin()
    {
        return Coin::where('amount', '<>', 0)->update(['amount' => 0]);
    }
}
