<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <title></title>
</head>
<body>
    @php
        $total = 0;
    @endphp
    <div class="container">
        <h1>Anda telah melakukan pemesanan: </h1>
        <table class="table">
            <thead>
                <th>#</th>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Kuantitas</th>
                <th>Sub Total</th>
            </thead>
            <tbody>
                @foreach($carts as $cart)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$cart->product->name}}</td>
                        <td>Rp. {{number_format($cart->product->price)}}</td>
                        <td>{{$cart->qty}}</td>
                        <td>Rp. {{number_format($cart->qty * $cart->product->price)}}</td>
                    </tr>
                @php
                    $total += ($cart->qty * $cart->product->price)
                @endphp
                @endforeach
            </tbody>
        </table>
        <h1>Total Pemesanan : Rp. {{number_format($total)}}</h1>
    </div>
    
<script src="{{asset('js/app.js')}}"></script>

</body>
</html>