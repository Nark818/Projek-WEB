<!DOCTYPE html>
<html>
  <head>
    @include('dashboard.css')

    <style type="text/css">
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
        <div class="page-header mb-2">
          <div class="container-fluid d-flex justify-content-between align-items-center">

            <h1>Manages User</h1>
            
            <!-- Transparent button with plus icon -->
            <div class="ms-auto">
              <a href="{{url('create_user')}}" class="btn btn-transparent">
                <i class="fa fa-plus"></i>
                <i class="fa fa-user"></i>
                Create User
              </a>
            </div>

            {{-- <form class="div_tengah" action="{{url('search_user')}}" method="GET">
                @csrf
                <input type="search" name="search">
                <input class="btn btn-secondary" type="submit" value="Search">
            </form> --}}

          </div>
        </div>

        <div class="d-flex justify-content-center p-4 mt-sm-1">

          <table class="table table-dark table-striped">
              <caption>List of users</caption>
              <thead>

                <tr>
                  <th>Name</th>
    
                  <th>Email</th>
    
                  {{-- <th>Password</th> --}}
    
                  <th>Role</th>
    
                  <th>Address</th>
    
                  <th>Fate Changer</th>
                </tr>

              </thead>
              <tbody>
      
                @foreach($user as $users)
    
                <tr>
                    <td>{{$users->name}}</td>
    
                    <td>{{$users->email}}</td>
    
                    {{-- <td>{{$users->password}}</td> --}}
    
                    <td>{{$users->role}}</td>
    
                    <td>{{$users->address}}</td>
    
                    <td>
                        <a class="btn btn-danger" href="{{url('delete_user', $users->id)}}">Delete</a>
                        <a class="btn btn-warning" href="{{url('update_user', $users->id)}}">Edit</a>
                    </td>
    
                </tr>
                
                @endforeach
      
              </tbody>
      
      
          </table>
      
          </div>

          </div>
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