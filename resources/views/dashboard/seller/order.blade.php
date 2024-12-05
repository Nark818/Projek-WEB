<!DOCTYPE html>
<html>
  <head>
    @include('dashboard.css')
    <style>
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
        align-content: center;
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
            <h1>Order Table</h1>
          </div>
        </div>

        <div class="d-flex justify-content-center p-4 mt-sm-1">
          <table class="table table-dark table-striped">
            <thead>
              <tr>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Produk Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Status</th>
                <th>Change Status</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($data as $order)
              <tr>
                <td>{{$order->name}}</td>
                <td>{{$order->rec_address}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->produk->name}}</td>
                <td>{{$order->produk->price}}</td>
                <td>
                  <img width="150" src="produks/{{$order->produk->image}}" alt="">
                </td>
                <td>
                  @if($order->status == 'in progress')
                    <span style="color: red">{{$order->status}}</span>
                  @elseif($order->status == 'On the way')
                    <span style="color: yellow">{{$order->status}}</span>
                  @else
                    <span style="color: green">{{$order->status}}</span>
                  @endif
                </td>
                <td>
                  <a class="btn btn-primary" href="{{url('on_the_way', $order->id)}}">On the way</a>
                  <a class="btn btn-success" href="{{url('delivered', $order->id)}}">Delivered</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
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