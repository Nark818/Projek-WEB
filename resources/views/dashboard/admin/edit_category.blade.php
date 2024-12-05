<!DOCTYPE html>
<html>
  <head>
    @include('dashboard.css')

    <style>
        input[type='text']
        {
            width: 400px;
            height: 40px;
        }
    </style>
  </head>
  <body>
    
    @include('dashboard.header')
    
    @include('dashboard.admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h1>Edit Category</h1>

          </div>
      </div>

      <div class="d-flex justify-content-center">
        <form action="{{url('update_category', $data->id)}}" method="POST">
        @csrf
            <div style="padding: 5px">
                <input type="text" name="category" value="{{$data->name}}">
                <input class="btn btn-primary" type="submit" value="Update Category">
            </div>
        </form>
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