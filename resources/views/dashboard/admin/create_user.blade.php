<!DOCTYPE html>
<html>
  <head>
    @include('dashboard.css')

    <style type="text/css">
      .div_tengah
      {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
      }

      h1
      {
        color: white;
      }

      .table_design
      {
        border: 2px solid white;
      }

        th
        {
        background-color: grey;
        color: white;
        font-size: 19px;
        font-weight: bold;
        text-align: center;
        padding: 15px;
        }

        label
        {
            color: white
            display: inline-block;
            width: 200px;
            padding: 20px;
        }

        input[type='text']
        {
            width: 300px;
            height: 60px;
        }

      td
      {
        border: 1px solid white;
        text-align: center
      }

      input[type='search']
      {
        width: 500px;
        height: 42px;
        margin-left: 50px;
      }

      .btn-transparent {
        background-color: transparent;
        border: none;
        color: white; /* Change this color as needed */
      }

      .btn-transparent:hover {
        color: green; /* Change this color as needed */
      }
    </style>
  </head>
  <body>
    
    @include('dashboard.header')
    
    @include('dashboard.admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid d-flex justify-content-between align-items-center">

            <h1>Create User</h1>

          </div>
        </div>

        <div class="d-flex justify-content-center">
            
            <form action="{{url('upload_user')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Name</label>
                    <input type="text" name="name">
                </div>

                <div>
                    <label>Email</label>
                    <input type="text" name="email">
                </div>

                <div>
                    <label>Password</label>
                    <input type="text" name="password">
                </div>

                <div>
                    <label>Address</label>
                    <input type="text" name="address">
                </div>

                <div>
                    <label>Role</label>
                    <select name="role">
                        <option>Select an option</option>
                        <option value="buyer">Buyer</option>
                        <option value="seller">Seller</option>
                    </select>
                </div>

                <div class="p-3">
                    <input class="btn btn-success" type="submit" value="Create User">
                </div>

            </form>

        </div>
    </div>
    <!-- JavaScript files-->
    </script>
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