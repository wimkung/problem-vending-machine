@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Products</h2>
            <p><strong>Total fund : {{ $fund }} Baht.</strong></p>
        </div>
    </div>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4" style=" text-align: center;">
                <img src="{{ $product->image }}" alt="">
                <p>Name : {{ $product->name }}</p>
                <p>Price : {{ $product->price }}</p>
                <a class="btn btn-success" href="{{ route('select', ['product_id' => $product->id]) }}">Select</a>
            </div>
        @endforeach
    </div>
@endsection