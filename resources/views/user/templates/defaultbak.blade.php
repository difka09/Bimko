<!DOCTYPE html>
<html lang="en">
    @include('user.templates.partials._head')
<body class="bg-light">

  <!-- Preloader -->
  <div class="loader-mask">
    <div class="loader">
      <div></div>
    </div>
  </div>

  {{-- <!-- Bg Overlay -->
  <div class="content-overlay"></div>

  <!-- Sidenav -->
  <header class="sidenav" id="sidenav">

    <!-- close -->
    <div class="sidenav__close">
      <button class="sidenav__close-button" id="sidenav__close-button" aria-label="close sidenav">
        <i class="ui-close sidenav__close-icon"></i>
      </button>
    </div>

    <!-- Nav -->
    <nav class="sidenav__menu-container">
      <ul class="sidenav__menu" role="menubar">
        <!-- Categories -->
        <li>
          <a href="#" class="sidenav__menu-link sidenav__menu-link-category sidenav__menu-link--orange">World</a>
        </li>
        <li>
          <a href="#" class="sidenav__menu-link sidenav__menu-link-category sidenav__menu-link--blue">Business</a>
        </li>
        <li>
          <a href="#" class="sidenav__menu-link sidenav__menu-link-category sidenav__menu-link--red">Politics</a>
        </li>
        <li>
          <a href="#" class="sidenav__menu-link sidenav__menu-link-category sidenav__menu-link--salad">Lifestyle</a>
        </li>
        <li>
          <a href="#" class="sidenav__menu-link sidenav__menu-link-category sidenav__menu-link--purple">Tech</a>
        </li>
        <li>
          <a href="#" class="sidenav__menu-link sidenav__menu-link-category sidenav__menu-link--yellow">Fashion</a>
        </li>
        <li>
          <a href="#" class="sidenav__menu-link sidenav__menu-link-category sidenav__menu-link--light-blue">Sport</a>
        </li>
        <li>
          <a href="#" class="sidenav__menu-link sidenav__menu-link-category sidenav__menu-link--violet">Science</a>
        </li>

        <li>
          <a href="#" class="sidenav__menu-link">Posts</a>
          <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i class="ui-arrow-down"></i></button>
          <ul class="sidenav__menu-dropdown">
            <li><a href="single-post-gallery.html" class="sidenav__menu-link">Gallery Post</a></li>
            <li><a href="single-post.html" class="sidenav__menu-link">Video Post</a></li>
            <li><a href="single-post.html" class="sidenav__menu-link">Audio Post</a></li>
            <li><a href="single-post-quote.html" class="sidenav__menu-link">Quote Post</a></li>
          </ul>
        </li>

        <li>
          <a href="#" class="sidenav__menu-link">Pages</a>
          <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i class="ui-arrow-down"></i></button>
          <ul class="sidenav__menu-dropdown">
            <li><a href="about.html" class="sidenav__menu-link">About</a></li>
            <li><a href="contact.html" class="sidenav__menu-link">Contact</a></li>
            <li><a href="search-results.html" class="sidenav__menu-link">Search Results</a></li>
            <li><a href="categories.html" class="sidenav__menu-link">Categories</a></li>
            <li><a href="shortcodes.html" class="sidenav__menu-link">Shortcodes</a></li>
            <li><a href="lazyload.html" class="sidenav__menu-link">Lazyload</a></li>
            <li><a href="404.html" class="sidenav__menu-link">404</a></li>
          </ul>
        </li>

        <li>
          <a href="about.html" class="sidenav__menu-link">About</a>
        </li>

        <li>
          <a href="contact.html" class="sidenav__menu-link">Contact</a>
        </li>

        <li>
          <a href="#" class="sidenav__menu-link">Advertise</a>
        </li>
      </ul>
    </nav>

    <div class="socials sidenav__socials">
      <a class="social social-facebook" href="#" target="_blank" aria-label="facebook">
        <i class="ui-facebook"></i>
      </a>
      <a class="social social-twitter" href="#" target="_blank" aria-label="twitter">
        <i class="ui-twitter"></i>
      </a>
      <a class="social social-google-plus" href="#" target="_blank" aria-label="google">
        <i class="ui-google"></i>
      </a>
      <a class="social social-youtube" href="#" target="_blank" aria-label="youtube">
        <i class="ui-youtube"></i>
      </a>
      <a class="social social-instagram" href="#" target="_blank" aria-label="instagram">
        <i class="ui-instagram"></i>
      </a>
    </div>
  </header> <!-- end sidenav --> --}}

  <main class="main oh" id="main">

    @include('user.templates.partials._header')


    {{-- <!-- Header -->
    <div class="header">
      <div class="container">
        <div class="flex-parent align-items-center">

          <!-- Logo -->
          <a href="index.html" class="logo d-none d-lg-block">
            <img class="logo__img" src="img/logo.png" srcset="img/logo.png 1x, img/logo@2x.png 2x" alt="logo">
          </a>

          <!-- Ad Banner 728 -->
          <div class="text-center">
            <a href="#">
              <img src="img/blog/placeholder_leaderboard.jpg" alt="">
            </a>
          </div>

        </div>
      </div>
    </div> <!-- end header --> --}}

    <!-- Trending Now -->
    <div class="trending-now">
      <div class="container relative">
        <span class="trending-now__label">Trending</span>
        <ul class="newsticker">
          <li class="newsticker__item"><a href="single-post.html" class="newsticker__item-url">A-HA theme is multi-purpose solution for any kind of business</a></li>
          <li class="newsticker__item"><a href="single-post-1.html" class="newsticker__item-url">Satelite cost tens of millions or even hundreds of millions of dollars to build</a></li>
          <li class="newsticker__item"><a href="single-post-3.html" class="newsticker__item-url">8 Hidden Costs of Starting and Running a Business</a></li>
        </ul>
        <div class="newsticker-buttons">
          <button class="newsticker-button newsticker-button--prev" id="newsticker-button--prev" aria-label="next article"><i class="ui-arrow-left"></i></button>
          <button class="newsticker-button newsticker-button--next" id="newsticker-button--next" aria-label="previous article"><i class="ui-arrow-right"></i></button>
        </div>
      </div>
    </div>

    {{-- <!-- Featured Posts Grid -->
    <section class="featured-posts-grid bg-dark">
      <div class="container clearfix">

        <!-- Large post slider -->
        <div class="featured-posts-grid__item featured-posts-grid__item--lg">
          <div id="owl-hero-grid" class="owl-carousel owl-theme owl-carousel--dots-inside">

            <article class="entry featured-posts-grid__entry">
              <div class="thumb-bg-holder owl-lazy" data-src="img/blog/featured_grid_slide_1.jpg">
                <img src="img/blog/featured_grid_slide_1.jpg" alt="" class="d-none">
                <a href="single-post.html" class="thumb-url"></a>
                <div class="bottom-gradient"></div>
              </div>

              <div class="thumb-text-holder">
                <a href="single-post.html" class="entry__meta-category entry__meta-category-color entry__meta-category-color--salad">Lifestyle</a>
                <h2 class="thumb-entry-title">
                  <a href="single-post.html">See a 360-Degree View of the Top of the Everest</a>
                </h2>
              </div>
            </article>

            <article class="entry featured-posts-grid__entry">
              <div class="thumb-bg-holder owl-lazy" data-src="img/blog/featured_grid_slide_2.jpg">
                <img src="img/blog/featured_grid_slide_2.jpg" alt="" class="d-none">
                <a href="single-post.html" class="thumb-url"></a>
                <div class="bottom-gradient"></div>
              </div>

              <div class="thumb-text-holder">
                <a href="single-post.html" class="entry__meta-category entry__meta-category-color entry__meta-category-color--blue">Business</a>
                <h2 class="thumb-entry-title">
                  <a href="single-post.html">BRICS Nations Agree to Create Own Development Bank</a>
                </h2>
              </div>
            </article>

            <article class="entry featured-posts-grid__entry">
              <div class="thumb-bg-holder owl-lazy" data-src="img/blog/featured_grid_slide_3.jpg">
                <img src="img/blog/featured_grid_slide_3.jpg" alt="" class="d-none">
                <a href="single-post.html" class="thumb-url"></a>
                <div class="bottom-gradient"></div>
              </div>

              <div class="thumb-text-holder">
                <a href="single-post.html" class="entry__meta-category entry__meta-category-color entry__meta-category-color--purple">Tech</a>
                <h2 class="thumb-entry-title">
                  <a href="single-post.html">Tesla's Giant Battery Farm Is Now Live in South Australia</a>
                </h2>
              </div>
            </article>

          </div> <!-- end owl slider -->
        </div> <!-- end large post slider -->


        <div class="featured-posts-grid__item featured-posts-grid__item--sm">
          <article class="entry featured-posts-grid__entry">
            <div class="thumb-bg-holder" style="background-image: url(img/blog/featured_grid_2.jpg);">
              <a href="single-post.html" class="thumb-url"></a>
              <div class="bottom-gradient"></div>
            </div>

            <div class="thumb-text-holder">
              <h2 class="thumb-entry-title thumb-entry-title--sm">
                <a href="single-post.html">These Are the 20 Best Places to Work in 2018</a>
              </h2>
              <ul class="entry__meta">
                <li class="entry__meta-author">
                  <i class="ui-author"></i>
                  <a href="#">DeoThemes</a>
                </li>
                <li class="entry__meta-date">
                  <i class="ui-date"></i>
                  21 October, 2017
                </li>
                <li class="entry__meta-comments">
                  <i class="ui-comments"></i>
                  <a href="#">115</a>
                </li>
              </ul>
            </div>
          </article>
        </div>

        <div class="featured-posts-grid__item featured-posts-grid__item--sm">
          <article class="entry featured-posts-grid__entry">
            <div class="thumb-bg-holder" style="background-image: url(img/blog/featured_grid_3.jpg);">
              <a href="single-post.html" class="thumb-url"></a>
              <div class="bottom-gradient"></div>
            </div>

            <div class="thumb-text-holder">
              <h2 class="thumb-entry-title thumb-entry-title--sm">
                <a href="single-post.html">Experience the Grand Canyon National Park</a>
              </h2>
              <ul class="entry__meta">
                <li class="entry__meta-author">
                  <i class="ui-author"></i>
                  <a href="#">DeoThemes</a>
                </li>
                <li class="entry__meta-date">
                  <i class="ui-date"></i>
                  21 October, 2017
                </li>
                <li class="entry__meta-comments">
                  <i class="ui-comments"></i>
                  <a href="#">115</a>
                </li>
              </ul>
            </div>
          </article>
        </div>

      </div>
    </section> <!-- end featured posts grid --> --}}

    <div class="main-container container mt-40" id="main-container">

      <!-- Content -->
      <div class="row">

        <!-- Posts -->
        <div class="col-lg-8 blog__content mb-30">

          <!-- Hot News -->
          <section class="section tab-post mb-10">
            <div class="title-wrap">
              <h3 class="section-title">Hot News</h3>

              <div class="tabs tab-post__tabs">
                <ul class="tabs__list">
                  <li class="tabs__item tabs__item--active">
                    <a href="#tab-all" class="tabs__trigger">All</a>
                  </li>
                  <li class="tabs__item">
                    <a href="#tab-world" class="tabs__trigger">World</a>
                  </li>
                  <li class="tabs__item">
                    <a href="#tab-business" class="tabs__trigger">Business</a>
                  </li>
                  <li class="tabs__item">
                    <a href="#tab-politics" class="tabs__trigger">Politics</a>
                  </li>
                  <li class="tabs__item">
                    <a href="#tab-marketing" class="tabs__trigger">Marketing</a>
                  </li>
                </ul> <!-- end tabs -->
              </div>
            </div>

            <!-- tab content -->
            <div class="tabs__content tabs__content-trigger tab-post__tabs-content">

              <div class="tabs__content-pane tabs__content-pane--active" id="tab-all">
                <div class="row">
                  <div class="col-md-6">
                    <article class="entry">
                      <div class="entry__img-holder">
                        <a href="single-post.html">
                          <div class="thumb-container thumb-75">
                            <img data-src="img/blog/grid_post_img_1.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                          </div>
                        </a>
                      </div>

                      <div class="entry__body">
                        <div class="entry__header">
                          <a href="#" class="entry__meta-category">science</a>
                          <h2 class="entry__title">
                            <a href="single-post.html">Optimal Amount of Rainfall for Plants</a>
                          </h2>
                          <ul class="entry__meta">
                            <li class="entry__meta-author">
                              <i class="ui-author"></i>
                              <a href="#">DeoThemes</a>
                            </li>
                            <li class="entry__meta-date">
                              <i class="ui-date"></i>
                              21 October, 2017
                            </li>
                            <li class="entry__meta-comments">
                              <i class="ui-comments"></i>
                              <a href="#">115</a>
                            </li>
                          </ul>
                        </div>
                        <div class="entry__excerpt">
                          <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-6">
                    <article class="entry">
                      <div class="entry__img-holder">
                        <a href="single-post.html">
                          <div class="thumb-container thumb-75">
                            <img data-src="img/blog/grid_post_img_2.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                          </div>
                        </a>
                      </div>

                      <div class="entry__body">
                        <div class="entry__header">
                          <a href="#" class="entry__meta-category">business</a>
                          <h2 class="entry__title">
                            <a href="single-post.html">BRICS Nations Agree to Create Own Development Bank</a>
                          </h2>
                          <ul class="entry__meta">
                            <li class="entry__meta-author">
                              <i class="ui-author"></i>
                              <a href="#">DeoThemes</a>
                            </li>
                            <li class="entry__meta-date">
                              <i class="ui-date"></i>
                              21 October, 2017
                            </li>
                            <li class="entry__meta-comments">
                              <i class="ui-comments"></i>
                              <a href="#">115</a>
                            </li>
                          </ul>
                        </div>
                        <div class="entry__excerpt">
                          <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </div> <!-- end pane 1 -->
              <div class="tabs__content-pane" id="tab-world">
                <div class="row">
                  <div class="col-md-6">
                    <article class="entry">
                      <div class="entry__img-holder">
                        <a href="single-post.html">
                          <div class="thumb-container thumb-75">
                            <img data-src="img/blog/grid_post_img_1.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                          </div>
                        </a>
                      </div>

                      <div class="entry__body">
                        <div class="entry__header">
                          <a href="#" class="entry__meta-category">science</a>
                          <h2 class="entry__title">
                            <a href="single-post.html">Optimal Amount of Rainfall for Plants</a>
                          </h2>
                          <ul class="entry__meta">
                            <li class="entry__meta-author">
                              <i class="ui-author"></i>
                              <a href="#">DeoThemes</a>
                            </li>
                            <li class="entry__meta-date">
                              <i class="ui-date"></i>
                              21 October, 2017
                            </li>
                            <li class="entry__meta-comments">
                              <i class="ui-comments"></i>
                              <a href="#">115</a>
                            </li>
                          </ul>
                        </div>
                        <div class="entry__excerpt">
                          <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-6">
                    <article class="entry">
                      <div class="entry__img-holder">
                        <a href="single-post.html">
                          <div class="thumb-container thumb-75">
                            <img data-src="img/blog/grid_post_img_2.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                          </div>
                        </a>
                      </div>

                      <div class="entry__body">
                        <div class="entry__header">
                          <a href="#" class="entry__meta-category">business</a>
                          <h2 class="entry__title">
                            <a href="single-post.html">BRICS Nations Agree to Create Own Development Bank</a>
                          </h2>
                          <ul class="entry__meta">
                            <li class="entry__meta-author">
                              <i class="ui-author"></i>
                              <a href="#">DeoThemes</a>
                            </li>
                            <li class="entry__meta-date">
                              <i class="ui-date"></i>
                              21 October, 2017
                            </li>
                            <li class="entry__meta-comments">
                              <i class="ui-comments"></i>
                              <a href="#">115</a>
                            </li>
                          </ul>
                        </div>
                        <div class="entry__excerpt">
                          <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </div> <!-- end pane 2 -->
              <div class="tabs__content-pane" id="tab-business">
                <div class="row">
                  <div class="col-md-6">
                    <article class="entry">
                      <div class="entry__img-holder">
                        <a href="single-post.html">
                          <div class="thumb-container thumb-75">
                            <img data-src="img/blog/grid_post_img_1.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                          </div>
                        </a>
                      </div>

                      <div class="entry__body">
                        <div class="entry__header">
                          <a href="#" class="entry__meta-category">science</a>
                          <h2 class="entry__title">
                            <a href="single-post.html">Optimal Amount of Rainfall for Plants</a>
                          </h2>
                          <ul class="entry__meta">
                            <li class="entry__meta-author">
                              <i class="ui-author"></i>
                              <a href="#">DeoThemes</a>
                            </li>
                            <li class="entry__meta-date">
                              <i class="ui-date"></i>
                              21 October, 2017
                            </li>
                            <li class="entry__meta-comments">
                              <i class="ui-comments"></i>
                              <a href="#">115</a>
                            </li>
                          </ul>
                        </div>
                        <div class="entry__excerpt">
                          <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-6">
                    <article class="entry">
                      <div class="entry__img-holder">
                        <a href="single-post.html">
                          <div class="thumb-container thumb-75">
                            <img data-src="img/blog/grid_post_img_2.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                          </div>
                        </a>
                      </div>

                      <div class="entry__body">
                        <div class="entry__header">
                          <a href="#" class="entry__meta-category">business</a>
                          <h2 class="entry__title">
                            <a href="single-post.html">BRICS Nations Agree to Create Own Development Bank</a>
                          </h2>
                          <ul class="entry__meta">
                            <li class="entry__meta-author">
                              <i class="ui-author"></i>
                              <a href="#">DeoThemes</a>
                            </li>
                            <li class="entry__meta-date">
                              <i class="ui-date"></i>
                              21 October, 2017
                            </li>
                            <li class="entry__meta-comments">
                              <i class="ui-comments"></i>
                              <a href="#">115</a>
                            </li>
                          </ul>
                        </div>
                        <div class="entry__excerpt">
                          <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </div> <!-- end pane 3 -->
              <div class="tabs__content-pane" id="tab-politics">
                <div class="row">
                  <div class="col-md-6">
                    <article class="entry">
                      <div class="entry__img-holder">
                        <a href="single-post.html">
                          <div class="thumb-container thumb-75">
                            <img data-src="img/blog/grid_post_img_1.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                          </div>
                        </a>
                      </div>

                      <div class="entry__body">
                        <div class="entry__header">
                          <a href="#" class="entry__meta-category">science</a>
                          <h2 class="entry__title">
                            <a href="single-post.html">Optimal Amount of Rainfall for Plants</a>
                          </h2>
                          <ul class="entry__meta">
                            <li class="entry__meta-author">
                              <i class="ui-author"></i>
                              <a href="#">DeoThemes</a>
                            </li>
                            <li class="entry__meta-date">
                              <i class="ui-date"></i>
                              21 October, 2017
                            </li>
                            <li class="entry__meta-comments">
                              <i class="ui-comments"></i>
                              <a href="#">115</a>
                            </li>
                          </ul>
                        </div>
                        <div class="entry__excerpt">
                          <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-6">
                    <article class="entry">
                      <div class="entry__img-holder">
                        <a href="single-post.html">
                          <div class="thumb-container thumb-75">
                            <img data-src="img/blog/grid_post_img_2.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                          </div>
                        </a>
                      </div>

                      <div class="entry__body">
                        <div class="entry__header">
                          <a href="#" class="entry__meta-category">business</a>
                          <h2 class="entry__title">
                            <a href="single-post.html">BRICS Nations Agree to Create Own Development Bank</a>
                          </h2>
                          <ul class="entry__meta">
                            <li class="entry__meta-author">
                              <i class="ui-author"></i>
                              <a href="#">DeoThemes</a>
                            </li>
                            <li class="entry__meta-date">
                              <i class="ui-date"></i>
                              21 October, 2017
                            </li>
                            <li class="entry__meta-comments">
                              <i class="ui-comments"></i>
                              <a href="#">115</a>
                            </li>
                          </ul>
                        </div>
                        <div class="entry__excerpt">
                          <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </div> <!-- end pane 4 -->
              <div class="tabs__content-pane" id="tab-marketing">
                <div class="row">
                  <div class="col-md-6">
                    <article class="entry">
                      <div class="entry__img-holder">
                        <a href="single-post.html">
                          <div class="thumb-container thumb-75">
                            <img data-src="img/blog/grid_post_img_1.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                          </div>
                        </a>
                      </div>

                      <div class="entry__body">
                        <div class="entry__header">
                          <a href="#" class="entry__meta-category">science</a>
                          <h2 class="entry__title">
                            <a href="single-post.html">Optimal Amount of Rainfall for Plants</a>
                          </h2>
                          <ul class="entry__meta">
                            <li class="entry__meta-author">
                              <i class="ui-author"></i>
                              <a href="#">DeoThemes</a>
                            </li>
                            <li class="entry__meta-date">
                              <i class="ui-date"></i>
                              21 October, 2017
                            </li>
                            <li class="entry__meta-comments">
                              <i class="ui-comments"></i>
                              <a href="#">115</a>
                            </li>
                          </ul>
                        </div>
                        <div class="entry__excerpt">
                          <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        </div>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-6">
                    <article class="entry">
                      <div class="entry__img-holder">
                        <a href="single-post.html">
                          <div class="thumb-container thumb-75">
                            <img data-src="img/blog/grid_post_img_2.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                          </div>
                        </a>
                      </div>

                      <div class="entry__body">
                        <div class="entry__header">
                          <a href="#" class="entry__meta-category">business</a>
                          <h2 class="entry__title">
                            <a href="single-post.html">BRICS Nations Agree to Create Own Development Bank</a>
                          </h2>
                          <ul class="entry__meta">
                            <li class="entry__meta-author">
                              <i class="ui-author"></i>
                              <a href="#">DeoThemes</a>
                            </li>
                            <li class="entry__meta-date">
                              <i class="ui-date"></i>
                              21 October, 2017
                            </li>
                            <li class="entry__meta-comments">
                              <i class="ui-comments"></i>
                              <a href="#">115</a>
                            </li>
                          </ul>
                        </div>
                        <div class="entry__excerpt">
                          <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </div> <!-- end pane 5 -->
            </div> <!-- end tab content -->
          </section> <!-- end hot news -->

          <!-- Latest News -->
          <section class="section">
            <div class="title-wrap">
              <h3 class="section-title">Latest News</h3>
              <a href="#" class="all-posts-url">View All</a>
            </div>

            <article class="entry post-list">
              <div class="entry__img-holder post-list__img-holder">
                <a href="single-post.html">
                  <div class="thumb-container thumb-75">
                    <img data-src="img/blog/list_post_img_1.jpg" src="img/empty.png" class="entry__img lazyload" alt="">
                  </div>
                </a>
              </div>

              <div class="entry__body post-list__body">
                <div class="entry__header">
                  <a href="#" class="entry__meta-category">business</a>
                  <h2 class="entry__title">
                    <a href="single-post.html">Your Business Is Talking. Do You Have the Tools to Listen?</a>
                  </h2>
                  <ul class="entry__meta">
                    <li class="entry__meta-author">
                      <i class="ui-author"></i>
                      <a href="#">DeoThemes</a>
                    </li>
                    <li class="entry__meta-date">
                      <i class="ui-date"></i>
                      21 October, 2017
                    </li>
                    <li class="entry__meta-comments">
                      <i class="ui-comments"></i>
                      <a href="#">115</a>
                    </li>
                  </ul>
                </div>
                <div class="entry__excerpt">
                  <p>Point of Sale hardware, the till at a shop check out, has become very complex over the past ten years. Modern POS hardware includes the cash till, bar-code readers...</p>
                </div>
              </div>
            </article>

            <article class="entry post-list">
              <div class="entry__img-holder post-list__img-holder">
                <a href="single-post.html">
                  <div class="thumb-container thumb-75">
                    <img data-src="img/blog/list_post_img_2.jpg" src="img/empty.png" class="entry__img lazyload" alt="">
                  </div>
                </a>
              </div>

              <div class="entry__body post-list__body">
                <div class="entry__header">
                  <a href="#" class="entry__meta-category">tech</a>
                  <h2 class="entry__title">
                    <a href="single-post.html">Removing Bitcoin payments from Steam is a smart move by Valve</a>
                  </h2>
                  <ul class="entry__meta">
                    <li class="entry__meta-author">
                      <i class="ui-author"></i>
                      <a href="#">DeoThemes</a>
                    </li>
                    <li class="entry__meta-date">
                      <i class="ui-date"></i>
                      21 October, 2017
                    </li>
                    <li class="entry__meta-comments">
                      <i class="ui-comments"></i>
                      <a href="#">115</a>
                    </li>
                  </ul>
                </div>
                <div class="entry__excerpt">
                  <p>Point of Sale hardware, the till at a shop check out, has become very complex over the past ten years. Modern POS hardware includes the cash till, bar-code readers...</p>
                </div>
              </div>
            </article>

            <article class="entry post-list">
              <div class="entry__img-holder post-list__img-holder">
                <a href="single-post.html">
                  <div class="thumb-container thumb-75">
                    <img data-src="img/blog/list_post_img_3.jpg" src="img/empty.png" class="entry__img lazyload" alt="">
                  </div>
                </a>
              </div>

              <div class="entry__body post-list__body">
                <div class="entry__header">
                  <a href="#" class="entry__meta-category">fashion</a>
                  <h2 class="entry__title">
                    <a href="single-post.html">This Is the Burberry Bag Every Fashion Girl Wanted 15 Years Ago</a>
                  </h2>
                  <ul class="entry__meta">
                    <li class="entry__meta-author">
                      <i class="ui-author"></i>
                      <a href="#">DeoThemes</a>
                    </li>
                    <li class="entry__meta-date">
                      <i class="ui-date"></i>
                      21 October, 2017
                    </li>
                    <li class="entry__meta-comments">
                      <i class="ui-comments"></i>
                      <a href="#">115</a>
                    </li>
                  </ul>
                </div>
                <div class="entry__excerpt">
                  <p>Point of Sale hardware, the till at a shop check out, has become very complex over the past ten years. Modern POS hardware includes the cash till, bar-code readers...</p>
                </div>
              </div>
            </article>

          </section> <!-- end latest news -->

          <!-- Ad Banner 728 -->
          <div class="text-center pb-40">
            <a href="#">
              <img src="img/blog/placeholder_leaderboard.jpg" alt="">
            </a>
          </div>

          {{-- <!-- Editor's Picks -->
          <section class="section editors-picks mb-20">
            <div class="title-wrap">
              <h3 class="section-title">Editor's Picks</h3>
              <a href="#" class="all-posts-url">View All</a>
            </div>
            <div class="row">
              <div class="col-lg-7">
                <article class="entry">
                  <div class="entry__img-holder">
                    <a href="single-post.html">
                      <div class="thumb-container thumb-75">
                        <img data-src="img/blog/editors_post_img.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                      </div>
                    </a>
                  </div>

                  <div class="entry__body">
                    <div class="entry__header">
                      <a href="#" class="entry__meta-category">science</a>
                      <h2 class="entry__title">
                        <a href="single-post.html">Synchrotron scanning reveals amphibious ecomorphology in a new clade of bird-like dinosaurs</a>
                      </h2>
                      <ul class="entry__meta">
                        <li class="entry__meta-author">
                          <i class="ui-author"></i>
                          <a href="#">DeoThemes</a>
                        </li>
                        <li class="entry__meta-date">
                          <i class="ui-date"></i>
                          21 October, 2017
                        </li>
                        <li class="entry__meta-comments">
                          <i class="ui-comments"></i>
                          <a href="#">115</a>
                        </li>
                      </ul>
                    </div>
                    <div class="entry__excerpt">
                      <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                    </div>
                  </div>
                </article>
              </div>
              <div class="col-lg-5">
                <ul class="post-list-small">
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="single-post.html">What Indie Beauty Companies Can Teach Entrepreneurs About Scaling</a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            21 October, 2017
                          </li>
                        </ul>
                      </div>
                    </article>
                  </li>
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="single-post.html">Bill Gates's 5 Favorite Books of 2017</a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            21 October, 2017
                          </li>
                        </ul>
                      </div>
                    </article>
                  </li>
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="single-post.html">Sheryl Sandberg's 6 Steps to Make Sure Everyone Feels Safe at Work</a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            21 October, 2017
                          </li>
                        </ul>
                      </div>
                    </article>
                  </li>
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="single-post.html">Elon Musk May Be Sending a Tesla Roadster to Space on a SpaceX Rocket</a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            21 October, 2017
                          </li>
                        </ul>
                      </div>
                    </article>
                  </li>
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="single-post.html">GoPro Accidentally Left In Path of Lava and Incredible Footage Survives</a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            21 October, 2017
                          </li>
                        </ul>
                      </div>
                    </article>
                  </li>
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="single-post.html">The One Goal Every Business Should Have, But Almost None Prioritize</a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            21 October, 2017
                          </li>
                        </ul>
                      </div>
                    </article>
                  </li>
                </ul>
              </div>
            </div>
          </section> <!-- end editors picks --> --}}

          {{-- <!-- Posts from categories -->
          <section class="section mb-0">
            <div class="row">

              <!-- World -->
              <div class="col-md-6 mb-40">
                <div class="title-wrap bottom-line bottom-line--orange">
                  <h3 class="section-title section-title--sm">World</h3>
                </div>
                <article class="entry">
                  <div class="entry__img-holder">
                    <a href="single-post.html">
                      <div class="thumb-container thumb-75">
                        <img data-src="img/blog/grid_post_img_3.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                      </div>
                    </a>
                  </div>

                  <div class="entry__body">
                    <div class="entry__header">
                      <h2 class="entry__title">
                        <a href="single-post.html">To Succeed in 2018, Ecommerce Entrepreneurs Must Focus on This One Change</a>
                      </h2>
                      <ul class="entry__meta">
                        <li class="entry__meta-author">
                          <i class="ui-author"></i>
                          <a href="#">DeoThemes</a>
                        </li>
                        <li class="entry__meta-date">
                          <i class="ui-date"></i>
                          21 October, 2017
                        </li>
                        <li class="entry__meta-comments">
                          <i class="ui-comments"></i>
                          <a href="#">115</a>
                        </li>
                      </ul>
                    </div>
                    <div class="entry__excerpt">
                      <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                    </div>
                  </div>
                </article>
                <ul class="post-list-small post-list-small--border-top">
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="single-post.html">What Indie Beauty Companies Can Teach Entrepreneurs About Scaling</a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            21 October, 2017
                          </li>
                        </ul>
                      </div>
                    </article>
                  </li>
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="single-post.html">Bill Gates's 5 Favorite Books of 2017</a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            21 October, 2017
                          </li>
                        </ul>
                      </div>
                    </article>
                  </li>
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="single-post.html">Sheryl Sandberg's 6 Steps to Make Sure Everyone Feels Safe at Work</a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            21 October, 2017
                          </li>
                        </ul>
                      </div>
                    </article>
                  </li>
                </ul>
              </div> <!-- end world -->

              <!-- Science -->
              <div class="col-md-6 mb-40">
                <div class="title-wrap bottom-line bottom-line--violet">
                  <h3 class="section-title section-title--sm">Science</h3>
                </div>
                <article class="entry">
                  <div class="entry__img-holder">
                    <a href="single-post.html">
                      <div class="thumb-container thumb-75">
                        <img data-src="img/blog/grid_post_img_4.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                      </div>
                    </a>
                  </div>

                  <div class="entry__body">
                    <div class="entry__header">
                      <h2 class="entry__title">
                        <a href="single-post.html">What hospitals can do to help keep excess opioids out of communities</a>
                      </h2>
                      <ul class="entry__meta">
                        <li class="entry__meta-author">
                          <i class="ui-author"></i>
                          <a href="#">DeoThemes</a>
                        </li>
                        <li class="entry__meta-date">
                          <i class="ui-date"></i>
                          21 October, 2017
                        </li>
                        <li class="entry__meta-comments">
                          <i class="ui-comments"></i>
                          <a href="#">115</a>
                        </li>
                      </ul>
                    </div>
                    <div class="entry__excerpt">
                      <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                    </div>
                  </div>
                </article>
                <ul class="post-list-small post-list-small--border-top">
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="single-post.html">What Indie Beauty Companies Can Teach Entrepreneurs About Scaling</a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            21 October, 2017
                          </li>
                        </ul>
                      </div>
                    </article>
                  </li>
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="single-post.html">Bill Gates's 5 Favorite Books of 2017</a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            21 October, 2017
                          </li>
                        </ul>
                      </div>
                    </article>
                  </li>
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="single-post.html">Sheryl Sandberg's 6 Steps to Make Sure Everyone Feels Safe at Work</a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            21 October, 2017
                          </li>
                        </ul>
                      </div>
                    </article>
                  </li>
                </ul>
              </div> <!-- end science -->

              <!-- Sport -->
              <div class="col-md-6 mb-40">
                <div class="title-wrap bottom-line bottom-line--light-blue">
                  <h3 class="section-title section-title--sm">Sport</h3>
                </div>
                <article class="entry">
                  <div class="entry__img-holder">
                    <a href="single-post.html">
                      <div class="thumb-container thumb-75">
                        <img data-src="img/blog/grid_post_img_5.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                      </div>
                    </a>
                  </div>

                  <div class="entry__body">
                    <div class="entry__header">
                      <h2 class="entry__title">
                        <a href="single-post.html">Phil Taylor: The Power and The Glory</a>
                      </h2>
                      <ul class="entry__meta">
                        <li class="entry__meta-author">
                          <i class="ui-author"></i>
                          <a href="#">DeoThemes</a>
                        </li>
                        <li class="entry__meta-date">
                          <i class="ui-date"></i>
                          21 October, 2017
                        </li>
                        <li class="entry__meta-comments">
                          <i class="ui-comments"></i>
                          <a href="#">115</a>
                        </li>
                      </ul>
                    </div>
                    <div class="entry__excerpt">
                      <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                    </div>
                  </div>
                </article>
                <ul class="post-list-small post-list-small--border-top">
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="single-post.html">What Indie Beauty Companies Can Teach Entrepreneurs About Scaling</a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            21 October, 2017
                          </li>
                        </ul>
                      </div>
                    </article>
                  </li>
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="single-post.html">Bill Gates's 5 Favorite Books of 2017</a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            21 October, 2017
                          </li>
                        </ul>
                      </div>
                    </article>
                  </li>
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="single-post.html">Sheryl Sandberg's 6 Steps to Make Sure Everyone Feels Safe at Work</a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            21 October, 2017
                          </li>
                        </ul>
                      </div>
                    </article>
                  </li>
                </ul>
              </div> <!-- end sport -->

              <!-- Business -->
              <div class="col-md-6 mb-40">
                <div class="title-wrap bottom-line bottom-line--blue">
                  <h3 class="section-title section-title--sm">Business</h3>
                </div>
                <article class="entry">
                  <div class="entry__img-holder">
                    <a href="single-post.html">
                      <div class="thumb-container thumb-75">
                        <img data-src="img/blog/grid_post_img_6.jpg" src="img/empty.png" class="entry__img lazyload" alt="" />
                      </div>
                    </a>
                  </div>

                  <div class="entry__body">
                    <div class="entry__header">
                      <h2 class="entry__title">
                        <a href="single-post.html">7 Ways Ecommerce Businesses Can Prevent Holiday Fraud</a>
                      </h2>
                      <ul class="entry__meta">
                        <li class="entry__meta-author">
                          <i class="ui-author"></i>
                          <a href="#">DeoThemes</a>
                        </li>
                        <li class="entry__meta-date">
                          <i class="ui-date"></i>
                          21 October, 2017
                        </li>
                        <li class="entry__meta-comments">
                          <i class="ui-comments"></i>
                          <a href="#">115</a>
                        </li>
                      </ul>
                    </div>
                    <div class="entry__excerpt">
                      <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                    </div>
                  </div>
                </article>
                <ul class="post-list-small post-list-small--border-top">
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="single-post.html">What Indie Beauty Companies Can Teach Entrepreneurs About Scaling</a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            21 October, 2017
                          </li>
                        </ul>
                      </div>
                    </article>
                  </li>
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="single-post.html">Bill Gates's 5 Favorite Books of 2017</a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            21 October, 2017
                          </li>
                        </ul>
                      </div>
                    </article>
                  </li>
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="single-post.html">Sheryl Sandberg's 6 Steps to Make Sure Everyone Feels Safe at Work</a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            21 October, 2017
                          </li>
                        </ul>
                      </div>
                    </article>
                  </li>
                </ul>
              </div> <!-- end business -->

            </div>
          </section> <!-- end posts from categories --> --}}

          <!-- Carousel posts -->
          <section class="section mb-20">
            <div class="title-wrap">
              <h3 class="section-title section-title--sm">More News</h3>
              <div class="carousel-nav">
                <button class="carousel-nav__btn carousel-nav__btn--prev" aria-label="previous slide">
                  <i class="ui-arrow-left"></i>
                </button>
                <button class="carousel-nav__btn carousel-nav__btn--next" aria-label="next slide">
                  <i class="ui-arrow-right"></i>
                </button>
              </div>
            </div>

            <!-- Slider -->
            <div id="owl-posts" class="owl-carousel owl-theme">
              <article class="entry">
                <div class="entry__img-holder">
                  <a href="single-post.html">
                    <div class="thumb-container thumb-75">
                      <img data-src="img/blog/carousel_img_1.jpg" src="img/blog/carousel_img_1.jpg" class="entry__img owl-lazy" alt="" />
                    </div>
                  </a>
                </div>

                <div class="entry__body">
                  <div class="entry__header">
                    <h2 class="entry__title entry__title--sm">
                      <a href="single-post.html">The Surprising Way This Designer Picked the Next It Colors</a>
                    </h2>
                    <ul class="entry__meta">
                      <li class="entry__meta-date">
                        <i class="ui-date"></i>
                        21 October, 2017
                      </li>
                      <li class="entry__meta-comments">
                        <i class="ui-comments"></i>
                        <a href="#">115</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </article>
              <article class="entry">
                <div class="entry__img-holder">
                  <a href="single-post.html">
                    <div class="thumb-container thumb-75">
                      <img data-src="img/blog/carousel_img_2.jpg" src="img/blog/carousel_img_2.jpg" class="entry__img owl-lazy" alt="" />
                    </div>
                  </a>
                </div>

                <div class="entry__body">
                  <div class="entry__header">
                    <h2 class="entry__title entry__title--sm">
                      <a href="single-post.html">What Fashion Editors Are Buying for Every Kid on Our Holiday List</a>
                    </h2>
                    <ul class="entry__meta">
                      <li class="entry__meta-date">
                        <i class="ui-date"></i>
                        21 October, 2017
                      </li>
                      <li class="entry__meta-comments">
                        <i class="ui-comments"></i>
                        <a href="#">115</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </article>
              <article class="entry">
                <div class="entry__img-holder">
                  <a href="single-post.html">
                    <div class="thumb-container thumb-75">
                      <img data-src="img/blog/carousel_img_3.jpg" src="img/blog/carousel_img_3.jpg" class="entry__img owl-lazy" alt="" />
                    </div>
                  </a>
                </div>

                <div class="entry__body">
                  <div class="entry__header">
                    <h2 class="entry__title entry__title--sm">
                      <a href="single-post.html">Why Coach's Cute New Holiday Collab Is Unexpected</a>
                    </h2>
                    <ul class="entry__meta">
                      <li class="entry__meta-date">
                        <i class="ui-date"></i>
                        21 October, 2017
                      </li>
                      <li class="entry__meta-comments">
                        <i class="ui-comments"></i>
                        <a href="#">115</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </article>
            </div> <!-- end slider -->

          </section>

        </div> <!-- end posts -->

        @include('user.templates.partials._sidebar')


      </div> <!-- end content -->
    </div> <!-- end main container -->
    @include('user.templates.partials._footer')



  </main> <!-- end main-wrapper -->

  @include('user.templates.partials._scripts')

</body>
</html>
