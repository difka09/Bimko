        <div class="col-2 col-lg-2 col-md-8 mainmenu-admin">
            <div class="col-12 title-menu blue">Admin Menu</div>
            <a href="{{route('guest.showuser')}}" class="col-12 menu-admin {{ request()->is('guest/profil') ? 'active' : '' }}">Edit Profil <span class="arrow">&rsaquo;</span></a>
            <a href="{{route('guest.createfeed')}}" class="col-12 menu-admin {{ request()->is('guest/createfeed') ? 'active' : '' }}">Tambah Artikel <span class="arrow">&rsaquo;</span></a>
            <a href="{{route('guest.showfeed')}}" class="col-12 menu-admin {{ request()->is('guest/showfeed') ? 'active' : '' }}">Daftar Artikel  <span class="arrow">&rsaquo;</span></a>
            <a href="{{route('guest.showcomment')}}" class="col-12 menu-admin {{ request()->is('guest/showcomment') ? 'active' : '' }}">Daftar Komentar <span class="arrow">&rsaquo;</span></a>
            <a href="{{route('guest.shownotification')}}" class="col-12 menu-admin hover {{ request()->is('guest/shownotification') ? 'active' : '' }}">Pemberitahuan <span class="arrow">&rsaquo;</span></a>
        </div>
