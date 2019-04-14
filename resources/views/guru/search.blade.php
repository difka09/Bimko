@extends('guru.templates.default')
@section('content')

<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
        <div class="ui-block">
            <div class="ui-block-title">
                <div class="h6 title">Showing 12 Results for: “<span class="c-primary">Mari</span>”</div>
            </div>
        </div>

        <div id="search-items-grid">
            <div class="ui-block">

                <!-- Search Result -->
                <article class="hentry post searches-item">
                    <div class="post__author author vcard inline-items">
                        <img src="{{asset('guru/img/avatar7-sm.jpg')}}" alt="author">
                        <div class="author-date">
                            <a class="h6 post__author-name fn" href="02-ProfilePage.html">Marina Valentine</a>
                            <div class="country">Long Island, NY</div>
                        </div>
                        <span class="notification-icon">
                            <a href="#" class="accept-request">
                                <span class="icon-add without-text">
                                    <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                                </span>
                            </a>
                            <a href="#" class="accept-request chat-message">
                                <svg class="olymp-chat---messages-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-chat---messages-icon')}}"></use></svg>
                            </a>
                        </span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                            <ul class="more-dropdown">
                                <li>
                                    <a href="#">Edit Post</a>
                                </li>
                                <li>
                                    <a href="#">Delete Post</a>
                                </li>
                                <li>
                                    <a href="#">Turn Off Notifications</a>
                                </li>
                                <li>
                                    <a href="#">Select as Featured</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <p class="user-description">
                        <span class="title">About Me:</span> Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
                        <span class="title">Favourite TV Shows:</span> Breaking Good, RedDevil, People of Interest, The...
                    </p>
                    <div class="post-block-photo js-zoom-gallery">
                        <a href="{{asset('guru/img/post-photo3.jpg')}}" class="col col-3-width"><img src="{{asset('guru/img/post-photo3.jpg')}}" alt="photo"></a>
                        <a href="{{asset('guru/img/post-photo4.jpg')}}" class="col col-3-width"><img src="{{asset('guru/img/post-photo4.jpg')}}" alt="photo"></a>
                        <a href="{{asset('guru/img/post-photo5.jpg')}}" class="more-photos col-3-width">
                            <img src="{{asset('guru/img/post-photo5.jpg')}}" alt="photo">
                            <span class="h2">+352</span>
                        </a>
                    </div>

                </article>
                <!-- ... end Search Result -->

            </div>
        </div>

        <a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="search-items-to-load.html" data-container="search-items-grid">
            <svg class="olymp-three-dots-icon">
                <use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
            </svg>
        </a>
    </div>

@endsection
