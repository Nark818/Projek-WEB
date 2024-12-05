<!DOCTYPE html>
<html>

<head>

    @include('home.css')

    <style>
        .spacer {
            height: 80px; /* Memberikan jarak kosong antara navbar dan konten */
        }
        .table-center th, .table-center td {
            text-align: center;
            vertical-align: middle;
        }
    </style>

</head>

<body>
    @include('home.header')

    <div class="spacer"></div>

    <div class="d-flex justify-content-center p-5">

        <table class="table table-dark table-striped table-center">
            <thead>
                <tr>
                    <th>Produk Name</th>
                    <th>Price</th>
                    <th>Delivery Status</th>
                    <th>Store Name</th>
                    <th>Image Produk</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                @foreach ($orders as $order)
                <tr>
                    <td>{{$order->produk->name}}</td>
                    <td>${{$order->produk->price}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->produk->store->name}}</td>
                    <td>
                        <img width="150" src="/produks/{{$order->produk->image}}" alt="">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- info section -->

    @include('home.footer')

</body>

</html>