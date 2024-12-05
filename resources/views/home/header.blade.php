<header class="header_section">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('/home')}}"><img src="{{asset('images/Logo_Eco.png')}}" style="width: 40px; height: auto;" alt="">EcoGrocer</a>
      
      <!-- Navbar Content -->
      <div class="collapse navbar-collapse" id="navbarNav">
        
        <!-- Right-Aligned Links -->
        <ul class="navbar-nav ms-auto">
          @if (Route::has('login'))
            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{url('mycart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> [{{$count}}]</a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('search_produk')}}" id="searchButton"><i class="fa fa-search" aria-hidden="true"></i> Search</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="userDropdown" style="padding: 15px; margin-top: 10px;">
                  @if(auth()->user()->role === 'admin' || auth()->user()->role === 'seller')
                    <li>
                      <a class="dropdown-item" href="{{auth()->user()->role === 'admin' ? url('admin/dashboard') : url('seller/dashboard')}}">
                        <i class="fa fa-home" aria-hidden="true"></i> Dashboard
                      </a>
                    </li>
                  @endif
                  <li>
                    <a class="dropdown-item" href="{{url('myorders')}}">
                      <i class="fa fa-truck" aria-hidden="true"></i> My Order
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{url('myfavorite')}}">
                      <i class="fa fa-heart" aria-hidden="true"></i> Favorite
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{route('profile.edit')}}">
                      <i class="fa fa-user" aria-hidden="true"></i> Edit Profile
                    </a>
                  </li>
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="dropdown-item">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                      </button>
                    </form>
                  </li>
                </ul>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link" href="#shop"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('search_produk')}}" id="searchButton"><i class="fa fa-search" aria-hidden="true"></i> Search</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/login') }}">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span>Login</span>
                </a>
              </li>
            @endauth
          @endif
        </ul>
      </div>
    </div>
  </nav>
</header>
