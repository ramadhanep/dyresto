    <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                Riwayat Pencarian
              </div>
              <div class="search-item">
                <a href="#">Restoran SMK 10</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">Smkn 10 Jakarta</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">#Dyresto</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
            </div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          @if(Auth::user()->level->level == "Administrator" || Auth::user()->level->level == "Waiter" || Auth::user()->level->level == "Pelanggan")
          <li class="dropdown dropdown-list-toggle">
            <a href="{{ route('order.index') }}" class="nav-link nav-link-lg beep">
              <i class="fas fa-cart-plus"></i>
            </a>
          </li>
          @endif
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            @if(!empty(Auth::user()->foto))
                <img alt="image" src="{{ asset('img_upload/pengguna/'.Auth::user()->foto) }}" class="nav-img rounded-circle mr-1">
            @else
                <img alt="image" src="{{ asset('stisla/img/avatar/avatar-1.png') }}" class="nav-img rounded-circle mr-1">
            @endif
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">
                LOGGED IN
                @include('_____FUNCTION/loggedIn')
                @php
                if(session('logged')){
                  $v = session('logged');
                  echo timeAgoEn($v);
                }
                @endphp
              </div>
              <a href="{{ route('profile') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="#" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        </ul>
      </nav>
