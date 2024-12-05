<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center" >
        {{-- <div class="avatar"><img src="{{asset('admincss/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div> --}}
        <div class="title">
          <h1 class="h3">{{Auth::user()->name}}</h1>
          <p>{{Auth::user()->role}}</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus-->
      <ul class="list-unstyled">
            <li><a href="{{url('/home')}}"> <i class="fa fa-arrow-left"></i>Back to Home Page </a></li>
            <li class="active"><a href="{{url('seller/dashboard')}}"><i class="icon-home"></i>Main</a></li>
            <li><a href="{{url('view_orders')}}"> <i class="fa fa-tags"></i>Orders </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Produks </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    {{-- <li><a href="{{url('seller/dashboard')}}">List Produk </a></li> --}}
                    <li><a href="{{url('add_produk')}}">Add Produk </a></li>
                </ul>
              </li>
      </ul>
    </nav>