<!DOCTYPE html>
<html>
  <head>
    @include('dashboard.css')

    <style>
        h2
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

                <h2>Add produk</h2>

            </div>
        </div>
            <div>

                
                <form action="{{url('upload_produk')}}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="input_deg">
                    <label>Produk Name</label>
                    <input type="text"  name="name" required>
                </div>

                <div class="input_deg">
                    <label>Description</label>
                    <textarea name="description" required></textarea>
                </div>

                <div class="input_deg">
                    <label>Price</label>
                    <input type="number" name="price" required>
                </div>

                <div class="input_deg">
                    <label>Stock</label>
                    <input type="number" name="stock" required>
                </div>

                <div class="input_deg">
                    <label>Produk Category</label>
                    <select name="category" required>
                        <option>Select a Option</option>

                        @foreach ($category as $category)

                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            
                        @endforeach

                    </select>
                </div>

                <div class="input_deg">
                    <label>Produk Image</label>
                    <input type="file" name="image" required>
                </div>

                <div class="input_deg">
                    <input class="btn btn-success" type="submit" value="Add Produk">
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