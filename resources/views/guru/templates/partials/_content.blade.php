<main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">

        <div class="ui-block">
            <!-- News Feed Form  -->
            <div class="news-feed-form">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active inline-items" data-toggle="tab" href="#home-1" role="tab" aria-expanded="true">
                            <svg class="olymp-status-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-status-icon')}}"></use></svg>
                            <span>Status</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link inline-items" data-toggle="tab" href="#profile-1" role="tab" aria-expanded="false">
                            <svg class="olymp-multimedia-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-multimedia-icon')}}"></use></svg>
                            <span>Multimedia</span>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
                        <form>
                            <div class="author-thumb">
                                <img src="{{asset('guru/img/author-page.jpg')}}" alt="author">
                            </div>
                            <div class="form-group with-icon label-floating is-empty">
                                <label class="control-label">Share what you are thinking here...</label>
                                <textarea class="form-control" placeholder=""></textarea>
                            </div>
                            <div class="add-options-message">
                                <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                                    <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-camera-icon')}}"></use></svg>
                                </a>
                                <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
                                    <svg class="olymp-computer-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-computer-icon')}}"></use></svg>
                                </a>

                                <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
                                    <svg class="olymp-small-pin-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-small-pin-icon')}}"></use></svg>
                                </a>

                                <button class="btn btn-primary btn-md-2">Post Status</button>
                                <button   class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>

                            </div>

                        </form>
                    </div>

                    <div class="tab-pane" id="profile-1" role="tabpanel" aria-expanded="true">
                        <form>
                            <div class="author-thumb">
                                <img src="{{asset('guru/img/author-page.jpg')}}" alt="author">
                            </div>
                            <div class="form-group with-icon label-floating is-empty">
                                <label class="control-label">Share what you are thinking here...</label>
                                <textarea class="form-control" placeholder=""  ></textarea>
                            </div>
                            <div class="add-options-message">
                                <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                                    <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-camera-icon')}}"></use></svg>
                                </a>
                                <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
                                    <svg class="olymp-computer-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-computer-icon')}}"></use></svg>
                                </a>

                                <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
                                    <svg class="olymp-small-pin-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-small-pin-icon')}}"></use></svg>
                                </a>

                                <button class="btn btn-primary btn-md-2">Post Status</button>
                                <button   class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>

                            </div>

                        </form>
                    </div>

                    <div class="tab-pane" id="blog" role="tabpanel" aria-expanded="true">
                        <form>
                            <div class="author-thumb">
                                <img src="{{asset('guru/img/author-page.jpg')}}" alt="author">
                            </div>
                            <div class="form-group with-icon label-floating is-empty">
                                <label class="control-label">Share what you are thinking here...</label>
                                <textarea class="form-control" placeholder=""  ></textarea>
                            </div>
                            <div class="add-options-message">
                                <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                                    <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-camera-icon')}}"></use></svg>
                                </a>
                                <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
                                    <svg class="olymp-computer-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-computer-icon')}}"></use></svg>
                                </a>

                                <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
                                    <svg class="olymp-small-pin-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-small-pin-icon')}}"></use></svg>
                                </a>
                                <button class="btn btn-primary btn-md-2">Post Status</button>
                                <button   class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- ... end News Feed Form  -->
        </div>

        <div id="newsfeed-items-grid">
            <div class="ui-block">
                <article class="hentry post">
                    <div class="post__author author vcard inline-items">
                        <img src="{{asset('guru/img/avatar10-sm.jpg')}}" alt="author">

                        <div class="author-date">
                            <a class="h6 post__author-name fn" href="#">Elaine Dreyfuss</a>
                            <div class="post__date">
                                <time class="published" datetime="2004-07-24T18:18">
                                    9 hours ago
                                </time>
                            </div>
                        </div>
                        <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris consequat.
                    </p>
                    <div class="post-additional-info inline-items">
                        <div class="comments-shared">
                            <a href="#" class="post-add-icon inline-items">
                                <svg class="olymp-speech-balloon-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon')}}"></use></svg>
                                <span>17</span>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Comments -->
                <ul class="comments-list">
                    <li class="comment-item">
                        <div class="post__author author vcard inline-items">
                            <img src="{{asset('guru/img/author-page.jpg')}}" alt="author">
                            <div class="author-date">
                                <a class="h6 post__author-name fn" href="02-ProfilePage.html">James Spiegel</a>
                                <div class="post__date">
                                    <time class="published" datetime="2004-07-24T18:18">
                                        38 mins ago
                                    </time>
                                </div>
                            </div>
                            <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
                        </div>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium der doloremque laudantium.</p>
                    </li>
                    <li class="comment-item">
                        <div class="post__author author vcard inline-items">
                            <img src="{{asset('guru/img/avatar1-sm.jpg')}}" alt="author">

                            <div class="author-date">
                                <a class="h6 post__author-name fn" href="#">Mathilda Brinker</a>
                                <div class="post__date">
                                    <time class="published" datetime="2004-07-24T18:18">
                                        1 hour ago
                                    </time>
                                </div>
                            </div>
                            <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
                        </div>
                        <p>Ratione voluptatem sequi en lod nesciunt. Neque porro quisquam est, quinder dolorem ipsum
                            quia dolor sit amet, consectetur adipisci velit en lorem ipsum duis aute irure dolor in reprehenderit in voluptate velit esse cillum.
                        </p>
                    </li>
                </ul>
                <!-- ... end Comments -->

                <a href="#" class="more-comments">View more comments <span>+</span></a>

                <!-- Comment Form  -->
                <form class="comment-form inline-items">
                    <div class="post__author author vcard inline-items">
                        <img src="{{asset('guru/img/author-page.jpg')}}" alt="author">
                        <div class="form-group with-icon-right ">
                            <textarea class="form-control" placeholder=""></textarea>
                            <div class="add-options-message">
                                <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                                    <svg class="olymp-camera-icon">
                                        <use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-camera-icon')}}"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-md-2 btn-primary">Post Comment</button>
                    <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel</button>
                </form>
                <!-- ... end Comment Form  -->
            </div>
        </div>
        <a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>

    </main>
