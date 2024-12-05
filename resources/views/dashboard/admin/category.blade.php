<!DOCTYPE html>
<html>
  <head>
    @include('dashboard.css')

    <style type="text/css">
      h1 {
        color: white;
      }

      th {
        background-color: rgba(93, 93, 93, 0.945);
        color: white;
        font-size: 19px;
        font-weight: bold;
        text-align: center;
        padding: 15px;
      }

      td {
        border: 1px solid white;
        text-align: center;
      }

      input[type='text'] {
        width: 400px;
        height: 40px;
      }

      .btn-transparent {
        background-color: transparent;
        border: none;
        color: white; /* Change this color as needed */
      }

      .btn-transparent:hover {
        color: green; /* Change this color as needed */
      }

      table {
        width: 600px;
        margin-top: auto;
        text-align: center;
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

            <h1>Add Category</h1>

            <form action="{{url('add_category')}}" method="POST">
              @csrf

              <div class="d-flex justify-content-center">
                <div style="padding: 5px">
                  <input type="text" name="category">
                </div>
                <div style="padding: 5px">
                  <input class="btn btn-primary" type="submit" value="Add Category">
                </div>
              </div>

            </form>

          </div>
        </div>

        <div class="d-flex justify-content-center p-4 mt-sm-1">
          <table class="table table-dark table-striped">
            <caption>List of categories</caption>
            <thead>
              <tr>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $data)
              <tr>
                <td>{{$data->category_name}}</td>
                <td><a class="btn btn-success" href="{{url('edit_category', $data->id)}}">Edit</a></td>
                <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category', $data->id)}}">Delete</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <footer class="footer">
            <div class="footer__block block no-margin-bottom">
                <div class="container-fluid text-center">
                    <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- JavaScript files-->
    <script type="text/javascript">

      function confirmation(ev)
      {
        ev.preventDefault();

        var urlToRedirect = ev.currentTarget.getAttribute('href');

        console.log(urlToRedirect);

        swal({
          title: "Are you sure to Delete This?",
          text: "This delete will be permanent",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })

        .then((willCancel)=>{

          if(willCancel)
          {
            window.location.href = urlToRedirect;
          }

        });

      }
    
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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