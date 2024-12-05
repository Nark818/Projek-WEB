<!DOCTYPE html>
<html>

<head>

    @include('home.css')

</head>

<body>
  <div style="height: 30px"></div>
  @include('home.header')

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
        <!-- Search Form -->
        <form action="{{ url('find_produk') }}" method="GET" style="max-width: 500px; margin: 0 auto 20px;">
            <div class="input-group">
                <input class="form-control" type="search" name="search" placeholder="Search for products..." aria-label="Search">
                <button class="btn btn-dark" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
        <!-- End Search Form -->

        <div class="row d-flex flex-wrap">
            @foreach($produks as $produk)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <div class="img-box">
                        <img src="{{asset('produks/'.$produk->image)}}" alt="">
                    </div>
                    <div class="detail-box">
                        <h6>{{$produk->name}}</h6>
                        <h6>
                            Price
                            <span>${{$produk->price}}</span>
                        </h6>
                    </div>
                    <div style="padding: 15px">
                        <a href="{{url('produk_details', $produk->id)}}"><i class="fa fa-info-circle" aria-hidden="true"></i> Details</a>
                        <a href="{{url('add_cart', $produk->id)}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add</a>
                        <a href="{{url('add_favorite', $produk->id)}}"><i class="fa fa-heart" style="color: red" aria-hidden="true"></i> Favorite</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
  </section>

  <!-- end shop section -->


  <!-- contact section -->

    @include('home.contact')

  <!-- end contact section -->



  <!-- info section -->

@include('home.footer')

</body>

</html>