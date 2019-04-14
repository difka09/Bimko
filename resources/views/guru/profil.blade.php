@extends('guru.templates.defaultprofil')
@section('content')

<div class="container">
<div class="row">
    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="ui-block">
            <div class="top-header">
                <div class="top-header-thumb">
                    <img src="{{asset('guru/img/top-header1.jpg')}}" alt="nature">
                </div>
                <div class="profile-section">
                    <div class="control-block-button">
                        <div class="btn btn-control bg-primary more">
                            <svg class="olymp-settings-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-settings-icon')}}"></use></svg>
                            <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                <li>
                                    <a href="29-YourAccount-AccountSettings.html">Account Settings</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="top-header-author">
                    <a href="02-ProfilePage.html" class="author-thumb">
                        <img src="{{asset('guru/img/author-main1.jpg')}}" alt="author">
                    </a>
                    <div class="author-content">
                        <a href="02-ProfilePage.html" class="h4 author-name">James Spiegel</a>
                    <div class="country">San Francisco, CA</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="container">
    <div class="row">
        <!-- Main Content -->
        <div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
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
                <a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
                    <svg class="olymp-three-dots-icon">
                        <use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
                    </svg>
                </a>
            </div>
        <!-- ... end Main Content -->

        <!-- Left Sidebar -->
    <div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
        <div class="ui-block">
            <div class="ui-block-title">
                <h6 class="title">Profile Intro</h6>
            </div>
            <div class="ui-block-content">
                <!-- W-Personal-Info -->
                <ul class="widget w-personal-info item-block">
                    <li>
                        <span class="title">About Me:</span>
                        <span class="text">Hi, I’m James, I’m 36 and I work as a Digital Designer for the  “Daydreams” Agency in Pier 56.</span>
                    </li>
                    <li>
                        <span class="title">Favourite TV Shows:</span>
                        <span class="text">Breaking Good, RedDevil, People of Interest, The Running Dead, Found,  American Guy.</span>
                    </li>
                    <li>
                        <span class="title">Favourite Music Bands / Artists:</span>
                        <span class="text">Iron Maid, DC/AC, Megablow, The Ill, Kung Fighters, System of a Revenge.</span>
                    </li>
                </ul>
                <!-- .. end W-Personal-Info -->

                <!-- W-Socials -->
                <div class="widget w-socials">
                    <h6 class="title">Other Social Networks:</h6>
                    <a href="#" class="social-item bg-facebook">
                        <svg class="svg-inline--fa fa-facebook-f fa-w-9" aria-hidden="true" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 512" data-fa-i2svg=""><path fill="currentColor" d="M76.7 512V283H0v-91h76.7v-71.7C76.7 42.4 124.3 0 193.8 0c33.3 0 61.9 2.5 70.2 3.6V85h-48.2c-37.8 0-45.1 18-45.1 44.3V192H256l-11.7 91h-73.6v229"></path></svg><!-- <i class="fab fa-facebook-f" aria-hidden="true"></i> -->
                        Facebook
                    </a>
                    <a href="#" class="social-item bg-twitter">
                        <svg class="svg-inline--fa fa-twitter fa-w-16" aria-hidden="true" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg><!-- <i class="fab fa-twitter" aria-hidden="true"></i> -->
                        Twitter
                    </a>
                    <a href="#" class="social-item bg-dribbble">
                        <svg class="svg-inline--fa fa-dribbble fa-w-16" aria-hidden="true" data-prefix="fab" data-icon="dribbble" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119.252 8 8 119.252 8 256s111.252 248 248 248 248-111.252 248-248S392.748 8 256 8zm163.97 114.366c29.503 36.046 47.369 81.957 47.835 131.955-6.984-1.477-77.018-15.682-147.502-6.818-5.752-14.041-11.181-26.393-18.617-41.614 78.321-31.977 113.818-77.482 118.284-83.523zM396.421 97.87c-3.81 5.427-35.697 48.286-111.021 76.519-34.712-63.776-73.185-116.168-79.04-124.008 67.176-16.193 137.966 1.27 190.061 47.489zm-230.48-33.25c5.585 7.659 43.438 60.116 78.537 122.509-99.087 26.313-186.36 25.934-195.834 25.809C62.38 147.205 106.678 92.573 165.941 64.62zM44.17 256.323c0-2.166.043-4.322.108-6.473 9.268.19 111.92 1.513 217.706-30.146 6.064 11.868 11.857 23.915 17.174 35.949-76.599 21.575-146.194 83.527-180.531 142.306C64.794 360.405 44.17 310.73 44.17 256.323zm81.807 167.113c22.127-45.233 82.178-103.622 167.579-132.756 29.74 77.283 42.039 142.053 45.189 160.638-68.112 29.013-150.015 21.053-212.768-27.882zm248.38 8.489c-2.171-12.886-13.446-74.897-41.152-151.033 66.38-10.626 124.7 6.768 131.947 9.055-9.442 58.941-43.273 109.844-90.795 141.978z"></path></svg><!-- <i class="fab fa-dribbble" aria-hidden="true"></i> -->
                        Dribbble
                    </a>
                </div>
                <!-- ... end W-Socials -->
            </div>
        </div>
     </div>
    <!-- ... end Left Sidebar -->

    </div>
</div>

@endsection
