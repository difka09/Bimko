<!-- Header-BP -->

<header class="header" id="site-header">

        <div class="page-title">
            <h6> {{ request()->is('tes/123') ? 'Beranda' : '' }} </h6>
            <h6> {{ request()->is('tes/123/a/files') ? 'data file' : '' }} </h6>
            <h6> {{ request()->is('tes/123/a/agenda') ? 'agenda' : '' }} </h6>
            <h6> {{ request()->is('tes/123/a/responder') ? 'permintaan responder' : '' }} </h6>
            <h6> {{ request()->is('tes/123/a/pesan-konseling') ? 'permintaan konseling' : '' }} </h6>
            <h6> {{ request()->is('tes/123/profil/*') ? 'profil' : '' }} </h6>
            <h6> {{ request()->is('tes/123/edit/profil') ? 'edit profil' : '' }} </h6>
            <h6> {{ request()->is('allnotifications') ? 'pemberitahuan' : '' }} </h6>

        </div>

        <div class="header-content-wrapper">
            <form class="search-bar w-search notification-list friend-requests">
                <div class="form-group with-button">
                    <input style="text-align: left;margin-left: 1px;" class="form-control search-here" placeholder="Cari user atau guru lain di sini..." type="text">
                    <button style="height: 60px;pointer-events: none" disabled>
                        <svg class="olymp-magnifying-glass-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon')}}"></use></svg>
                    </button>
                </div>
                <div class="im-here">
                </div>
            </form>

            <div class="control-block">
                <div class="control-icon more has-items dropdown-notifications">
                    <svg class="olymp-thunder-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-thunder-icon')}}"></use></svg>
                    @if (auth()->user()->unreadNotifications->count() > 20)
                    <div class="label-avatar bg-primary notif-count idnotifications" id="idnotifications">20+</div>
                    @else
                    <div class="label-avatar bg-primary notif-count idnotifications" id="idnotifications">{{auth()->user()->unreadNotifications->count()}}</div>
                    @endif
                    <div class="more-dropdown more-with-triangle triangle-top-center">
                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">Pemberitahuan</h6>
                        </div>

                        <div class="mCustomScrollbar" data-mcs-theme="dark">
                            <ul class="notification-list idnotificationsMenu">
                                <li>
                                    <div class="notification-event">
                                        <div>loading..</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <a href="javascript:void(0)" class="view-all bg-primary all-read">Lihat Semua Pemberitahuan</a>
                    </div>
                </div>
                <div class="home-title">
                    <a class="page-title" style="padding:26px 26px 26px 26px;min-width: 0px;float: unset;text-align: center" href="{{Route('guru.index')}}"><span>Beranda</span></a>
                </div>

                <div class="author-page author vcard inline-items more">
                    <div class="author-thumb" style="max-height: 36px;max-width: 36px;">
                        <img alt="author" style="max-height: 36px;max-width: 36px; width: 36px;height: 36px" src="{{auth()->user()->getImage()}}" class="avatar">
                        {{-- <span class="icon-status online"></span> --}}
                        <div class="more-dropdown more-with-triangle">
                            <div class="mCustomScrollbar" data-mcs-theme="dark">
                                <div class="ui-block-title ui-block-title-small">
                                    <h6 class="title">Akun Saya</h6>
                                </div>

                                <ul class="account-settings">
                                    <li>
                                        <a href="{{Route('guru.profil',auth()->user()->id)}}">
                                            <svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" data-original-title="FAV PAGE"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-star-icon')}}"></use></svg>
                                                <span>Profil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{Route('guru.editprofil')}}">
                                            <svg class="olymp-menu-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-menu-icon')}}"></use></svg>
                                                <span>Edit Profil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            <svg class="olymp-logout-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-logout-icon')}}"></use></svg>
                                            <span>Log Out</span>
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="author-name fn">
                        <div class="author-title">
                            {{auth()->user()->name}} <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg>
                        </div>
                        @if (auth()->user()->school)
                        <span class="author-subtitle">{{auth()->user()->school->name}}</span>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </header>
   <!-- ... end Header-BP -->

<header class="header header-responsive" id="site-header-responsive">
    <div class="header-content-wrapper">
        <ul class="nav nav-tabs mobile-app-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#notify" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-thunder-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-thunder-icon')}}"></use></svg>
                        @if (auth()->user()->unreadNotifications->count() > 20)
                        <div class="label-avatar bg-primary notif-count idnotifications" id="mobileidnotifications">20+</div>
                        @else
                        <div class="label-avatar bg-primary notif-count idnotifications" id="mobileidnotifications">{{auth()->user()->unreadNotifications->count()}}</div>
                        @endif
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#search" role="tab">
                    <svg class="olymp-magnifying-glass-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon')}}"></use></svg>
                    <svg class="olymp-close-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use></svg>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{Route('guru.index')}}"> Beranda
                </a>
            </li>

        </ul>
    </div>

    <div class="tab-content tab-content-responsive">
    <div class="tab-pane" id="notify" role="tabpanel">
        <div class="mCustomScrollbar" data-mcs-theme="dark">
        <div class="ui-block-title ui-block-title-small">
            <h6 class="title">Pemberitahuan</h6>
        </div>
            <ul class="notification-list idnotificationsMenu">
                <li>
                    <div class="notification-event">
                        <div>loading..</div>
                    </div>
                </li>
            </ul>
        </div>
        <a href="javascript:void(0)" class="view-all bg-primary all-read">Lihat Semua Pemberitahuan</a>
    </div>


    <div class="tab-content tab-content-responsive">
        <div class="tab-pane " id="search" role="tabpanel">
            <form class="search-bar w-search notification-list friend-requests">
                    <div class="form-group with-button">
                        <input style="text-align: left;margin-left: 1px;" class="form-control search-here" placeholder="Cari user atau guru lain di sini..." type="text">
                    </div>
                    <div class="im-here">
                    </div>
            </form>
        </div>
    </div>
    </div>

</header>


