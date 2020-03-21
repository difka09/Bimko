<!-- Navigation -->
<header class="nav">

    <div class="nav__holder nav--sticky">
      <div class="container relative">
        <div class="flex-parent">

          <!-- Side Menu Button -->
          <button class="nav-icon-toggle d-lg-none" id="nav-icon-toggle" aria-label="Open side menu">
            <span class="nav-icon-toggle__box">
              <span class="nav-icon-toggle__inner"></span>
            </span>
          </button> <!-- end Side menu button -->
          <header class="sidenav sidenav--is-open d-lg-none" id="sidenav">

                <!-- close -->
                <div class="sidenav__close d-lg-none">
                  <button class="sidenav__close-button" id="sidenav__close-button" aria-label="close sidenav">
                    <i class="ui-close sidenav__close-icon"></i>
                  </button>
                </div>

                <!-- Nav -->
                <nav class="sidenav__menu-container d-lg-none">
                  <ul class="sidenav__menu" role="menubar">
                    <li>
                      <a href="/feed" class="sidenav__menu-link sidenav__menu-link-category">Beranda</a>
                    </li>
                    <li>
                      <a href="#" class="sidenav__menu-link">Kategori</a>
                      <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i class="ui-arrow-down"></i></button>
                      <ul class="sidenav__menu-dropdown">
                        @foreach ($categories as $category)
                            <li><a href="{{Route('feed.category',$category->slug)}}" data-id="{{$category->id}}" class="sidenav__menu-link">{{$category->name}}</a></li>
                        @endforeach
                      </ul>
                    </li>
                    <li>
                        <a href="{{Route('feed.info')}}" class="sidenav__menu-link sidenav__menu-link-category">Tentang Kami</a>
                    </li>
                    @guest
                    <li>
                        <a href="/login" class="sidenav__menu-link sidenav__menu-link-category">Register/Login</a>
                    </li>
                    @endguest
                    @auth
                    <li>
                      <a href="#" class="sidenav__menu-link">{{ucwords(auth()->user()->name)}}</a>
                      <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i class="ui-arrow-down"></i>
                      </button>
                         <ul class="sidenav__menu-dropdown">
                        @if(auth()->user()->isGuest())
                        <li><a href="{{ route('guest.showuser') }}" class="sidenav__menu-link">Profil</a>
                        </li>
                        @endif
                        @if(auth()->user()->isGuru())
                        <li><a href="{{ route('guru.profil',auth()->user()->id)}}" class="sidenav__menu-link">Profil</a>
                        </li>
                        @endif
                        @if(auth()->user()->isMurid())
                        <li><a href="{{ route('murid.showuser') }}" class="sidenav__menu-link">Profil</a>
                        </li>
                        @endif
                        <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="sidenav__menu-link">Logout</a>
                        </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form
                        </ul>
                    </li>
                    
                    @endauth
                  </ul>
                </nav>

              </header>

          <!-- Mobile logo -->
          <a href="/feed" class="logo logo--mobile d-lg-none" style="color:white">
            BIMKO
          </a>
          <!-- Nav-wrap -->
          <nav class="flex-child nav__wrap d-none d-lg-block">
            <ul class="nav__menu">

              <li class="{{request()->is('feed') ? 'active' : ''}} "><a href="/feed">Beranda</a></li>

              <li class="{{request()->is('feed/category/*') ? 'active' : ''}} nav__dropdown">
                <a href="#">Kategori</a>
                <ul class="nav__dropdown-menu">
                @foreach ($categories as $category)
                <li><a href="{{Route('feed.category',$category->slug)}}" data-id="{{$category->id}}">{{$category->name}}</a></li>
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

              <li class="{{request()->is('feed/tentang-kami') ? 'active' : ''}}">
                <a href="{{Route('feed.info')}}">Tentang Kami</a>
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
                <li><a href="/login">Register/Login</a></li>
            @endguest

            @auth
                <li class="nav__dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ ucwords(Auth::user()->name) }} <span class="caret"></span>
                    </a>
                    {{-- <a href="#">{{ Auth::user()->name }} <span class="caret"></span></a> --}}
                <ul class="nav__dropdown-menu">
                     @if (auth()->user()->isGuru())
                    <li><a class="dropdown-item" href="{{ route('guru.profil',auth()->user()->id)}}">
                            Profil
                    </a></li>
                    @endif
                    @if (auth()->user()->isGuest())
                    <li><a class="dropdown-item" href="{{ route('guest.showuser') }}">
                        Profil
                    </a></li>
                    @endif
                    @if (auth()->user()->isMurid())
                    <li><a class="dropdown-item" href="{{ route('murid.showuser') }}">
                        profil
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
                </a></li>
            @endauth
        </ul>
        </div>

            <!-- Search -->
            <div class="nav__right-item nav__search">
              <a href="#" class="nav__search-trigger" id="nav__search-trigger">
                <i class="ui-search nav__search-trigger-icon"></i>
              </a>
              <div class="nav__search-box" id="nav__search-box">
                <form class="nav__search-form" action="{{route('feed.search')}}" method="POST">
                    @csrf
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
