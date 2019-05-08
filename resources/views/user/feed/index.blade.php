  @extends('user.templates.default')
  @section('content')
  <!-- Posts -->
    <div class="col-lg-8 blog__content mb-30">

        <!-- Latest News -->
        <section class="section">
          <div class="title-wrap">
            <h3 class="section-title">Artikel Terbaru</h3>
          </div>
        @csrf
        @if ($feeds->count()==0)
        <a>Artikel tidak ditemukan, jika anda sebagai responder silahkan buat artikel <a href="{{Route('guest.createfeed')}}">disini</a></a>
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
                    <a href="#">{{$feed->user->name}}</a>
                  </li>
                    <?php
                        $controller->tanggal($feed->created_at);
                    ?>
                  <li class="entry__meta-comments">
                    <i class="ui-comments"></i>
                    <a href="#">{{$feed->feedcomments->count()}}</a>
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

        {{-- Ad Banner 728  iklan custome --}}
        {{-- <div class="text-center pb-40">
          <a href="#">
            <img src="{{asset('user/img/blog/placeholder_leaderboard.jpg')}}" alt="">
          </a>
        </div> --}}
        <div class="title-wrap">
            {{ $feeds->links('vendor.pagination.paginationfeed') }}
            <br>
        </div>
        <a href="{{Route('guest.createfeed')}}" title="Konsultasi Yuk..." class="act-btn"></a>

      </div> <!-- end posts -->
      @endsection
      @push('scripts')
      <script>

      </script>
      @endpush
