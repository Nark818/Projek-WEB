<!DOCTYPE html>
<html>
  <head>
    @include('dashboard.css')

    <style>
        h1
        {
            color: white;
        }

        label
        {
            display: inline-block;
            width: 250px;
            font-size: 15px!important;
            color: white!important;
        }

        input[type='text']
        {
            width: 350px;
            height: 50px;
        }

        textarea
        {
            width: 450px;
            height: 80px;
        }

        .input_deg
        {
            padding: 15px;
        }
    </style>
  </head>
  <body>
    
    @include('dashboard.header')
    
    @include('dashboard.seller.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h2>Edit Produk</h2>

            <div>

                <form action="{{url('update_produk', $data->id)}}" method="POST" enctype="multipart/form-data">
              
                    @csrf
              
                    <div>
              
                        <div class="input_deg">
                            <label>Name Produk</label>
                            <input type="text" name="name" value="{{$data->name}}">
                        </div>
              
              
                        <div class="input_deg">
                            <label>Description</label>
                            <textarea name="description">{{$data->description}}</textarea>
                        </div>
              
              
                        <div class="input_deg">
                            <label>Price</label>
                            <input type="number" name="price" value="{{$data->price}}">
                        </div>
              
              
                        <div class="input_deg">
                            <label>Stock</label>
                            <input type="number" name="stock" value="{{$data->stock}}">
                        </div>
              
              
                        <div class="input_deg">
                            <label>Current Image</label>
                            <img width="159" src="/produks/{{$data->image}}" alt="">
                        </div>
              
                        <div class="input_deg">
                            <label>New Image</label>
                            <input type="file" name="image">
                        </div>
              
                        <div class="input_deg">
                            <input class="btn btn-success" type="submit" value="Update Produk">
                        </div>
              
                    </div>
                    
                </form>

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