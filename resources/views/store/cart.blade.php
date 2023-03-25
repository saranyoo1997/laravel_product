@extends('layout.front')

@section('content')
    <div class="container-md mt-5">
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Number</th>
                    <th>Total</th>


                </tr>
            </thead>

            <tbody>
                @foreach (auth()->user()->carts as $cart)
                    <tr>
                        <td>{{ $cart->product->name }}</td>
                        <td>{{ $cart->product->price }}</td>
                        <td>{{ $cart->number }}</td>
                        <td>{{ $cart->product->price * $cart->number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>



    </div>
@endsection
