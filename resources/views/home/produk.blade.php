<section id="shop" class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Latest Products</h2>
        </div>
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