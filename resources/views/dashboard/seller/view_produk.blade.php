<!DOCTYPE html>
<html>
  <head>
    @include('dashboard.css')

  </head>
  <body>
    
    @include('dashboard.header')
    
    @include('dashboard.seller.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h2 no-margin-bottom text-light">List Produk</h2>
        </div>
      </div>

            <section class="no-padding-top no-padding-bottom">
                <div class="container-fluid">
                
                <div class="d-flex flex-wrap justify-content-start">
                    @foreach ($produks as $produk)
                    <div class="card m-2" style="width: 18rem;">
                      <img src="{{asset('produks/'.$produk->image)}}" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">{{$produk->name}}</h5>
                        <p class="card-text">{{$produk->description}}</p>
                        <a href="{{url('edit_produk',$produk->id)}}" class="btn btn-warning">Edit</a>
                        <a href="{{url('delete_produk',$produk->id)}}" class="btn btn-danger">Delete</a>
                      </div>
                    </div>
                    @endforeach
                </div>
                
                </div>
                </section>

            <footer class="footer">
              <div class="footer__block block no-margin-bottom">
                <div class="container-fluid text-center">
                  <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                  <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
                </div>
              </div>
            </footer>

        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>