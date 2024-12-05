<!DOCTYPE html>
<html>
  <head>
    @include('dashboard.css')
  </head>
  <style>
    h1
      {
        color: white;
      }

    th
      {
        background-color: rgba(93, 93, 93, 0.945);
        color: white;
        font-size: 19px;
        font-weight: bold;
        text-align: center;
        padding: 15px;
      }

      td
      {
        border: 1px solid white;
        text-align: center;
        align-content: center;
      }
  </style>
  <body>
    
    @include('dashboard.header')
    
    @include('dashboard.admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h1>Manages Produk</h1>

          </div>
        </div>

        <div class="d-flex justify-content-center p-4 mt-sm-1">
          <table class="table table-dark table-striped">

            <caption>List of Produk</caption>
            <thead>
              <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Produk Seller</th>
                <th>Produk Store</th>
                <th>Image</th>
                <th>Delete</th>
              </tr>
            </thead>

            <tbody>
              @foreach($produks as $produk)

              <tr>
                <td>{{$produk->name}}</td>
                <td>${{$produk->price}}</td>
                <td>{{$produk->category}}</td>
                <td>{{$produk->seller_id}}</td>
                <td>{{$produk->store_id}}</td>
                <td><img width="150" src="{{asset('produks/'.$produk->image)}}"></td>
                <td><a class="btn btn-danger" href="{{url('del_produk', $produk->id)}}">Delete</a></td>
              </tr>

              @endforeach
            </tbody>

          </table>
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