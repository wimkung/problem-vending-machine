@extends('layout')
@section('content')
    <h2>Coin insert</h2>
    <div class="row">
        <div class="col-md-6">
            Total fund : {{ $total }} Baht.
        </div>
        <div class="col-md-6">
            <a class="btn btn-warning" href="{{ route('refund') }}">Refund</a>
            <a class="btn btn-success" href="{{ route('product.show') }}">Select product</a>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Coin</th>
                <th scope="col">Amount</th>
                <th scope="col">Insert</th>
            </tr>
            </thead>
            <tbody>
            @foreach($coins as $coin)
                <tr>
                    <td>{{ $coin->value }} Baht</td>
                    <td>{{ $coin->amount }} coin</td>
                    <td><a class="btn btn-info" href="{{ route('coin.insert', ['coin_value' => $coin->value]) }}">Coin {{ $coin->value }} Baht</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection