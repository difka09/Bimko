  @extends('user.templates.default')
  @section('content')
  <!-- Posts -->
    <div class="col-lg-8 blog__content mb-30">

        <!-- Latest News -->
        <section class="section">
          <div class="title-wrap">
            <h3 class="section-title">Latest News</h3>
          </div>
        @csrf
          @foreach ($feeds as $feed)
          <article class="entry post-list">
            <div class="entry__img-holder post-list__img-holder">
              <a href="single-post.html">
                <div class="thumb-container thumb-75">
                  <img data-src="{{$feed->getImage()}}" src="{{$feed->getImage()}}" class="entry__img lazyload" alt="">
                </div>
              </a>
            </div>

            <div class="entry__body post-list__body">
              <div class="entry__header">
                <a href="#" class="entry__meta-category">business</a>
                <h2 class="entry__title">
                <a href="{{ Route('feeds.show', $feed) }}">{{ $feed->name }}</a>
                </h2>
                <ul class="entry__meta">
                  <li class="entry__meta-author">
                    <i class="ui-author"></i>
                    <a href="#">DeoThemes</a>
                  </li>
                    <?php
                        $controller->tanggal($feed->created_at);
                    ?>
                  <li class="entry__meta-comments">
                    <i class="ui-comments"></i>
                    <a href="#">115</a>
                  </li>
                </ul>
              </div>
              <div class="entry__excerpt">
                  <p align="justify">{!! str_limit($feed->content,200) !!}</p>
              </div>
            </div>
          </article>
          @endforeach
        </section> <!-- end latest news -->

        <!-- Ad Banner 728 -->
        <div class="text-center pb-40">
          <a href="#">
            <img src="img/blog/placeholder_leaderboard.jpg" alt="">
          </a>
        </div>

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
        @foreach ($Allfeeds as $Allfeed)
              <article class="entry">
              <div class="entry__img-holder">
                <a href="#">
                  <div class="thumb-container thumb-75">
                    <img data-src="{{$Allfeed->getImage()}}" src="{{$Allfeed->getImage()}}" class="entry__img owl-lazy" alt="" />
                  </div>
                </a>
              </div>

              <div class="entry__body">
                <div class="entry__header">
                  <h2 class="entry__title entry__title--sm">
                  <a href="{{ route('feeds.show', $Allfeed)}}">{{ $Allfeed->name }}</a>
                  </h2>
                  <ul class="entry__meta">
                    <?php
                        $controller->tanggal($Allfeed->created_at);
                    ?>
                    <li class="entry__meta-comments">
                      <i class="ui-comments"></i>
                      <a href="#">115</a>
                    </li>
                  </ul>
                </div>
              </div>
            </article>
        @endforeach
          </div> <!-- end slider -->

        </section>

      </div> <!-- end posts -->
      @endsection
      @push('scripts')
      <script>

      </script>
      @endpush
