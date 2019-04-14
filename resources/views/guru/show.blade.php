@extends('guru.templates.defaultprofil')
@section('content')

<div class="container">
    <div class="row mt50">
        <div class="col col-xl-8 m-auto col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">

                <!-- Single Post -->
                <article class="hentry blog-post single-post single-post-v2">
                    <a href="#" class="post-category bg-blue-light">THE COMMUNITY</a>
                    <h2 class="h1 post-title">Here are the best tattoos of our community</h2>
                    <div class="single-post-additional inline-items">
                        <div class="post__author author vcard inline-items">
                            <img alt="author" src="{{asset('guru/img/avatar84-sm.jpg')}}" class="avatar">
                            <div class="author-date not-uppercase">
                                <a class="h6 post__author-name fn" href="#">Jack Scorpio</a>
                                <div class="author_prof">
                                    Author
                                </div>
                            </div>
                        </div>
                        <div class="post-date-wrap inline-items">
                            <svg class="olymp-calendar-icon">
                                <use xlink:href="#olymp-calendar-icon"></use>
                            </svg>
                            <div class="post-date">
                                <a class="h6 date" href="#">2 Months Ago</a>
                                <span>Date</span>
                            </div>
                        </div>
                        <div class="post-comments-wrap inline-items">
                            <svg class="olymp-comments-post-icon">
                                <use xlink:href="#olymp-comments-post-icon"></use>
                            </svg>
                            <div class="post-comments">
                                <a class="h6 comments" href="#">14</a>
                                <span>Comments</span>
                            </div>
                        </div>
                    </div>

                    <div class="post-thumb">
                        <img src="{{asset('guru/img/post-header1.jpg')}}" alt="author">
                    </div>

                    <div class="post-content-wrap">
                        <div class="post-content">
                            <h5 class="weight-normal">Lorem ipsum dolor sit amet, consectadipisicing elit, sed do eiusmod por incidid ut labore et dolore
                                magna aliqua. Ut enim ad minim veniam, quis nostrud lorem exercitation ullamco laboris.
                            </h5>
                            <p>Duis en aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                                inventore veritatis et quasi hitecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
                                voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
                                dolores eos qui ratione voluptatem sequi nesciunt Sed ut perspiciatis unde omnis iste natus
                                error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae
                                ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
                                ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
                                dolores eos qui ratione voluptatem sequi nesciunt.
                            </p>
                            <h3>Best Tattoos Slideshow</h3>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
                                sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                voluptatem accusantium doloremque.
                            </p>

                        </div>
                    </div>
                </article>
                <!-- ... end Single Post -->


                <!-- Comments -->
                <ul class="comments-list">
                    <li class="comment-item">
                        <div class="post__author author vcard inline-items">
                            <img src="{{asset('guru/img/avatar10-sm.jpg')}}" alt="author">
                            <div class="author-date">
                                <a class="h6 post__author-name fn" href="#">Elaine Dreyfuss</a>
                                <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                        5 mins ago
                                    </time>
                                </div>
                            </div>
                            <a href="#" class="more">
                                <svg class="olymp-three-dots-icon">
                                    <use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
                                </svg>
                            </a>
                        </div>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium der doloremque laudantium.</p>
                    </li>
                </ul>
                <!-- ... end Comments -->

                <a href="#" class="more-comments">View more comments <span>+</span></a>

                <!-- Comment Form  -->
                <form class="comment-form inline-items">
                    <div class="post__author author vcard inline-items">
                        <img src="{{asset('guru/img/author-page.jpg')}}" alt="author">
                        <div class="form-group with-icon-right is-empty">
                            <textarea class="form-control" placeholder=""></textarea>
                            <div class="add-options-message">
                                <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                                    <svg class="olymp-camera-icon">
                                        <use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-camera-icon')}}"></use>
                                    </svg>
                                </a>
                            </div>
                        <span class="material-input"></span></div>
                    </div>
                    <button class="btn btn-md-2 btn-primary">Post Comment</button>
                    <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel</button>
                </form>
                <!-- ... end Comment Form  -->

            </div>
        </div>
    </div>
</div>



@endsection
