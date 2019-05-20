  @extends('user.templates.default')
  @section('content')
  <!-- Posts -->
    <div class="col-lg-8 blog__content mb-30">

        <!-- Latest News -->
        <section class="section">
          <div class="title-wrap">
            <h3 class="section-title">Hasil pencarian: {{$input}}</h3>
          </div>
        @csrf
            @if ($feeds->count() ==0)
            <a>artikel yang anda cari tidak ditemukan</a>
            @endif
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
                <h2 class="entry__title">
                <a href="{{ Route('feeds.show', $feed) }}">{{ $feed->name }}</a>
                </h2>
                <ul class="entry__meta">
                  <li class="entry__meta-author">
                    <i class="ui-author"></i>
                    <a>{{$feed->user->name}}</a>
                  </li>
                    <?php
                        $controller->tanggal($feed->agreement->created_at);
                    ?>
                  <li class="entry__meta-comments">
                    <i class="ui-comments"></i>
                    <a>{{$feed->feedcomments->count()}}</a>
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
        {{ $feeds->links('vendor.pagination.paginationfeed') }}


      </div> <!-- end posts -->
      @endsection
      @push('scripts')
      <script>

      </script>
      @endpush
