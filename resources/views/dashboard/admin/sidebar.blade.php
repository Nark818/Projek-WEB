<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center" >
        {{-- <div class="avatar"><img src="{{asset('admincss/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div> --}}
        <div class="title">
          <h1 class="h3 text-white">{{Auth::user()->name}}</h1>
          <p class="text-white">{{Auth::user()->role}}</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus-->
      <ul class="list-unstyled">
        <li><a href="{{url('/home')}}"> <i class="fa fa-arrow-left"></i>Back to Shop </a></li>
            <li class="active"><a href="{{url('admin/dashboard')}}"><i class="icon-home"></i>Main </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Admin Tools </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('manage_user')}}"><i class="fa fa-th-large"></i>Manages User </a></li>
                    <li><a href="{{url('view_category')}}"><i class="fa fa-th-large"></i>Manages Category </a></li>
                    <li><a href="{{url('manage_produk')}}"><i class="fa fa-th-large"></i>Manages Produk </a></li>
                </ul>
              </li>
    </nav>