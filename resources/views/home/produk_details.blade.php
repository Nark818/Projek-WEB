<!DOCTYPE html>
<html>

<head>

    @include('home.css')

    <style type="text/css">
        .div_tengah {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }
        .detail-box {
            padding: 15px;
        }
        .store-image {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 100px; /* Adjust the size as needed */
            height: auto;
        }
        .box {
            position: relative;
        }
    </style>

</head>

<body>
  @include('home.header')

    <div style="height: 50px"></div>

    {{-- Produk Details Start --}}
    <section class="shop_section layout_padding">
        <div class="container">
          <div class="heading_container heading_center">
            <h2>
              Details Produk
            </h2>
          </div>
          <div class="row d-flex flex-wrap">

            <div class="col-md-12">
              <div class="box">
                  <!-- Store Image -->
                  @if($store && $store->image)
                      <img src="{{ asset('stores/' . $store->image) }}" alt="Store Image" class="store-image">
                  @endif

                  <div class="div_tengah">
                    <img width="400px" src="/produks/{{$data->image}}" alt="">
                  </div>
                  <div class="detail-box">
                    <h6>{{$data->name}}</h6>
                    <h6>
                      Price
                      <span>
                        ${{$data->price}}
                      </span>
                    </h6>
                  </div>

                  <div class="detail-box">
                    <h6>Kategori : {{$data->category}} </h6>
                    <h6>
                      Stok :
                      <span>
                        {{$data->stock}}
                      </span>
                    </h6>
                  </div>

                  <div class="detail-box">
                      <p>
                        {{$data->description}}
                      </p>
                  </div>

                  <div class="detail-box">
                    <a href="{{url('add_cart', $data->id)}}"><i id="cart" class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    <a href="{{url('add_favorite', $data->id)}}"><i id="heart" class="fa fa-heart" aria-hidden="true"></i></a>
                  </div>

              </div>
            </div>

        </div>
    </section>
    {{-- Produk Details End --}}

    <!-- info section -->

    @include('home.footer')
</body>

</html>