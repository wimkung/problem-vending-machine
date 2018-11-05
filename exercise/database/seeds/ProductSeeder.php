<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $stringData = file_get_contents(dirname(__FILE__) . '/Data/products.json');
        $products = json_decode($stringData);

        try{
            foreach ($products->data as $item){
                $product = new \App\Product();
                $product->name = $item->name;
                $product->image = $item->image;
                $product->price = $item->price;
                $product->in_stock = $item->in_stock;
                $product->save();
            }
        }
        catch (Exception $exception){
            echo $exception;
        }

        echo "Seed products successfully. \n";
    }
}
