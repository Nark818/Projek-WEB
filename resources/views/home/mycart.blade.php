<!DOCTYPE html>
<html>

<head>

    @include('home.css')

    <style>
        .spacer {
            height: 80px;
        }
        .table-center th, .table-center td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="spacer"></div>
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->

    <div class="d-flex justify-content-center p-5">

        <table class="table table-bordered table-light table-striped table-center">
            <thead>
                <tr>
                    <th>Produk Name</th>
                    <th>Produk Price</th>
                    <th>Image</th>
                    <th>Remove</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                <?php
                $value = 0;
                $item = 0;
                ?>

                @foreach($cart as $cart)
                <tr>
                    <td>{{$cart->produk->name}}</td>
                    <td>${{$cart->produk->price}}</td>
                    <td>
                        <img width="150" src="/produks/{{$cart->produk->image}}" alt="">
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{url('delete_cart', $cart->id)}}">Remove</a>
                    </td>
                </tr>

                <?php
                $value = $value + $cart->produk->price;
                $item = $item + 1;
                ?>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="d-flex justify-content-center">
        <h3 class="me-5">Total Price: ${{$value}}</h3>
        <h3>Total Item : {{$item}}</h3>
    </div>

    <div class="container mt-5 p-5">
        <div class="card shadow-sm p-4">
            <h3 class="text-center mb-4">Receiver Information</h3>
            <form action="{{url('confirm_order')}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Receiver Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter receiver's name" value="{{Auth::user()->name}}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Receiver Address</label>
                    <textarea name="address" class="form-control" rows="3" placeholder="Enter address">{{Auth::user()->address}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Receiver Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter phone number">
                </div>

                <div class="text-center mt-4">
                    <input type="submit" value="Place Order" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

    <!-- info section -->
    @include('home.footer')

</body>

</html>