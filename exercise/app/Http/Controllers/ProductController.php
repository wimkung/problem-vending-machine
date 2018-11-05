<?php

namespace App\Http\Controllers;

use App\Coin;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::where('name', 'LIKE', "%$keyword%")->paginate(6);

        return response()->json($products, 200);
    }

    public function show()
    {
        $data['products'] = Product::all();
        $data['fund'] = Coin::getTotal();

        return view('product', $data);
    }
}
