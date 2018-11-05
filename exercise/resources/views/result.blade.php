@extends('layout')
@section('content')
    <div class="row" style="text-align: center;">
        <div class="col-md-6">
            @if($item == null)
                <h3>Can't get item</h3>
            @else
                <h3>Got item</h3>
                <img src="{{ $item->image }}" alt="">
                <p>{{ $item->name }}</p>
                <p>{{ $item->price }}</p>
            @endif
            <p>Total change : {{ $total }} Baht.</p>
        </div>
        <div class="col-md-6">
            <h2>Change coin</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Coin</th>
                    <th scope="col">Change amount </th>
                </tr>
                </thead>
                <tbody>
                @foreach($coins as $coin)
                    <tr>
                        <td>{{ $coin->value }} Baht</td>
                        <td>{{ $coin->amount }} coin</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection