@extends('layout.front')

@section('content')
    <div class="container-md mt-5">
        @php
            $sumTotal = 0;


        @endphp
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="table-secondary">Product Name</th>
                    <th class="table-secondary">Price</th>
                    <th class="table-secondary">Number</th>
                    <th class="table-secondary">Total</th>


                </tr>
            </thead>

            <tbody>
                @foreach (auth()->user()->carts as $cart)
                    @php
                        $total =  $cart->product->price * $cart->number ;
                        $sumTotal += $total;

                    @endphp

                    <tr>
                        <td>{{ $cart->product->name }}</td>
                        <td>{{ $cart->product->price }}</td>
                        <td>{{ $cart->number }}</td>
                        <td>{{ $total }} ฿</td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th class="table-secondary" colspan="3">Sum Total</th>
                    <td class="table-danger">{{$sumTotal}} ฿</td>
                </tr>
            </tfoot>
        </table>



    </div>
@endsection
