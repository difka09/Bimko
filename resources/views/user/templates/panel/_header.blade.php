    <header class="row">
            <div class="col-2 col-lg-10 offset-1 logo">
                <div class="col-12 logo-big">PORTAL BIMKO</div>
                <div class="col-12 logo-small">{{ request()->is('murid/*') ? 'Dashboard Murid' : '' }}</div>
                <div class="col-12 logo-small">{{ request()->is('guest/*') ? 'Dashboard Responder' : '' }}</div>
            </div>
            <nav class="col-12 nav-header">
                <ul>
                    <a href="/" class="col-2"><li>Beranda</li></a>
                    @if (auth()->user()->isGuest())
                    <a href="/guest/profil" class="col-2"><li>Profil</li></a>
                    @endif
                    @if (auth()->user()->isMurid())
                    <a href="/murid/profil" class="col-2"><li>Profil</li></a>
                    @endif
                    <a href="{{ route('logout') }}" class="col-2" onclick="event.preventDefault();document.getElementById('logout-form-mobile').submit();"><li>Logout</li></a>
                </ul>
                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                <div class="col-3 offset-7 search-box">
                    <div class="col-2 offset-6" id="log-btn">&nbsp;</div>
                </div>
            </nav>
            <div id="log-menu" style="top: 9%">
                <div class="col-12">
                <div class="col-2 col-lg-10"><img src="{{asset('user/panel/img/profile.png')}}"></div>
                    <div class="col-10 dlog">
                        {{ auth::user()->name }}
                    </div>
                </div>
                @if (auth()->user()->isGuest())
                <a href="/guest/profil" class="col-6 col-lg-10">Profil</a>
                @endif
                @if (auth()->user()->isMurid())
                <a href="/murid/profil" class="col-6 col-lg-10">Profil</a>
                @endif
                <a href="{{ route('logout') }}" class="col-6 col-lg-10" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
            </form>
        </header>
