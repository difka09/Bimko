    <header class="row">
            <div class="col-2 col-lg-10 offset-1 logo">
                <div class="col-12 logo-big">PORTAL BERITA</div>
                <div class="col-12 logo-small">Kabar Berita Terbaru</div>
            </div>
            <nav class="col-12 nav-header">
                <ul>
                    <a href="/" class="col-2"><li>Home</li></a>
                    <a href="/logout" class="col-1 id-log" onclick="event.preventDefault();document.getElementById('logout').submit();"><li>Logout</li></a>
                    <a href="/guest/profil" class="col-1 id-log"><li>Profile</li></a>
                </ul>
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
                <a href="/guest/profil" class="col-6 col-lg-10">Profile</a>
                <a href="{{ route('logout') }}" class="col-6 col-lg-10" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
            </form>
        </header>
