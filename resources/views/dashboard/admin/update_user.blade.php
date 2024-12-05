<!DOCTYPE html>
<html>
  <head>
    @include('dashboard.css')

    <style>
        .div_tengah
        {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        label
        {
            display: inline-block;
            width: 200px;
            padding: 20px;
        }

        input[type='text']
        {
            width: 300px;
            height: 60px;
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

            <h2>Update User</h2>

          </div>
        </div>

            <div class="div_tengah">

                <form action="{{url('edit_user', $data->id)}}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div>
                        <label>Name</label>
                        <input type="text" name="name" value="{{$data->name}}">
                    </div>
    
                    <div>
                        <label>Email</label>
                        <input type="text" name="email" value="{{$data->email}}">
                    </div>
    
                    <div>
                        <label>Addres</label>
                        <input type="text" name="address" value="{{$data->address}}">
                    </div>

                    <div>
                        <input class="btn btn-success" type="submit" value="Update User">
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