<!-- Navigation -->
<header class="nav">

    <div class="nav__holder nav--sticky">
      <div class="container relative">
        <div class="flex-parent">

          {{-- <!-- Side Menu Button -->
          <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open side menu">
            <span class="nav-icon-toggle__box">
              <span class="nav-icon-toggle__inner"></span>
            </span>
          </button> <!-- end Side menu button --> --}}

          <!-- Mobile logo -->
          <a href="index.html" class="logo logo--mobile d-lg-none">
            <img class="logo__img" src="{{asset('user/img/logo_mobile.png')}}" srcset="{{asset('user/img/logo_mobile.png')}} 1x, {{asset('user/img/logo_mobile@2x.png')}} 2x" alt="logo">
          </a>

          <!-- Nav-wrap -->
          <nav class="flex-child nav__wrap d-none d-lg-block">
            <ul class="nav__menu">

              <li class="active">
                <a href="/feed">Beranda</a>
              </li>

              <li class="nav__dropdown">
                <a href="#">Kategori</a>
                <ul class="nav__dropdown-menu">
                @foreach ($categories as $category)
                <li><a href="{{Route('feed.category',$category->slug)}}" data-id="{{$category->id}}">{{$category->name}}</a></li>
                  {{-- <li><a href="{{Route('feed.category')}}">Hiburan</a></li>
                  <li><a href="{{Route('feed.category')}}">Info Kuliah</a></li>
                  <li><a href="{{Route('feed.category')}}">Info Iklan</a></li> --}}
                  @endforeach
                </ul>
              </li>

              {{-- <li class="nav__dropdown">
                <a href="#">Pages</a>
                <ul class="nav__dropdown-menu">
                  <li><a href="about.html">About</a></li>
                  <li><a href="contact.html">Contact</a></li>
                  <li><a href="search-results.html">Search Results</a></li>
                  <li><a href="categories.html">Categories</a></li>
                  <li><a href="404.html">404</a></li>
                </ul>
              </li> --}}
{{--
              <li class="nav__dropdown">
                <a href="#">Tentang Kami</a>
                <ul class="nav__dropdown-menu">
                  <li><a href="lazyload.html">Lazy Load</a></li>
                  <li><a href="shortcodes.html">Shortcodes</a></li>
                </ul>
              </li> --}}

              <li>
                <a href="#">Tentang Kami</a>
              </li>

            </ul> <!-- end menu -->
          </nav> <!-- end nav-wrap -->



          <!-- Nav Right -->
          <div class="nav__right nav--align-right d-lg-flex">

            <!-- Socials -->
        <div class="nav__right-item flex-child nav__wrap d-none d-lg-block">
{{--
              <a  href="/login" target="_blank">
                Login/Register
              </a> --}}
        <ul class="nav__menu">
            @guest
                <li><a href="{{Route('login.users')}}">Register/Login</a></li>
            @endguest

            @auth
                <li class="nav__dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    {{-- <a href="#">{{ Auth::user()->name }} <span class="caret"></span></a> --}}
                <ul class="nav__dropdown-menu">
                    </a></li>
                    @if (auth()->user()->isGuru())
                    <li><a class="dropdown-item" href="{{ route('guru.index') }}">
                            Home
                    </a></li>
                    @endif
                    @if (auth()->user()->isGuest())
                    <li><a class="dropdown-item" href="{{ route('guest.showuser') }}">
                        Home
                    </a></li>
                    @endif
                  <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                </ul>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endauth
        </ul>
        </div>

            <!-- Search -->
            <div class="nav__right-item nav__search">
              <a href="#" class="nav__search-trigger" id="nav__search-trigger">
                <i class="ui-search nav__search-trigger-icon"></i>
              </a>
              <div class="nav__search-box" id="nav__search-box">
                <form class="nav__search-form" action="{{route('feed.search')}}" method="GET">
                  <input type="text" id="cari" name="cari" placeholder="Cari artikel disini" class="nav__search-input">
                  <button type="submit" class="search-button btn btn-lg btn-color btn-button">
                    <i class="ui-search nav__search-icon"></i>
                  </button>
                </form>
              </div>

            </div>


          </div> <!-- end nav right -->

        </div> <!-- end flex-parent -->
      </div> <!-- end container -->

    </div>
  </header> <!-- end navigation -->
