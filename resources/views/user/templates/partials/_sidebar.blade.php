        <!-- Sidebar -->
        <aside class="col-lg-4 sidebar sidebar--right">


            <!-- Widget Popular/Latest Posts -->
            <div class="widget widget-tabpost">
              <div class="tabs widget-tabpost__tabs">
                <ul class="tabs__list widget-tabpost__tabs-list">
                  <li class="tabs__item widget-tabpost__tabs-item tabs__item--active">
                    <a href="#tab-trending" class="tabs__url tabs__trigger widget-tabpost__tabs-url">Terpopuler</a>
                  </li>
                  <li class="tabs__item widget-tabpost__tabs-item">
                    <a href="#tab-latest" class="tabs__url tabs__trigger widget-tabpost__tabs-url">Terbaru</a>
                  </li>
                  {{-- <li class="tabs__item widget-tabpost__tabs-item">
                    <a href="#tab-comments" class="tabs__url tabs__trigger widget-tabpost__tabs-url">Comments</a>
                  </li> --}}
                </ul> <!-- end tabs -->

                <!-- tab content -->
                <div class="tabs__content tabs__content-trigger widget-tabpost__tabs-content">
                  <div class="tabs__content-pane tabs__content-pane--active" id="tab-trending">
                    <ul class="post-list-small">
                      @foreach ($populars as $popular)


                      <li class="post-list-small__item">
                        <article class="post-list-small__entry clearfix">
                          <div class="post-list-small__img-holder">
                            <div class="thumb-container thumb-75">
                              <a href="{{ route('feeds.show', $popular)}}">
                                <img data-src="{{ $popular->getImage() }}" src="{{ $popular->getImage() }}" alt="" class=" lazyload">
                              </a>
                            </div>
                          </div>
                          <div class="post-list-small__body">
                            <h3 class="post-list-small__entry-title">
                            <a href="{{ route('feeds.show', $popular)}}">{{ $popular->name }}</a>
                            </h3>
                            <ul class="entry__meta">
                                <?php
                                    $controller->tanggal($popular->created_at);
                                ?>
                            </ul>
                          </div>
                        </article>
                      </li>
                      @endforeach
                    </ul>
                  </div>

                  <div class="tabs__content-pane" id="tab-latest">
                    <ul class="post-list-small">
                        @foreach ($latests as $latest)
                      <li class="post-list-small__item">
                        <article class="post-list-small__entry clearfix">
                          <div class="post-list-small__img-holder">
                            <div class="thumb-container thumb-75">
                              <a href="{{ route('feeds.show', $latest)}}">
                                <img data-src="{{ $latest->getImage() }}" src="{{ $latest->getImage() }}" alt="" class=" lazyload">
                              </a>
                            </div>
                          </div>
                          <div class="post-list-small__body">
                            <h3 class="post-list-small__entry-title">
                              <a href="{{ route('feeds.show', $latest)}}">{{ $latest->name }}</a>
                            </h3>
                            <ul class="entry__meta">
                                <?php
                                    $controller->tanggal($latest->created_at);
                                ?>
                            </ul>
                          </div>
                        </article>
                      </li>
                      @endforeach
                    </ul>
                  </div>

                  {{-- <div class="tabs__content-pane" id="tab-comments">
                    <ul class="post-list-small">
                        @foreach ($feedcomments as $feedcomment)
                      <li class="post-list-small__item">
                        <article class="post-list-small__entry clearfix">
                          <div class="post-list-small__body">
                            <h3 class="post-list-small__entry-title">
                                <a>{{$feedcomment->user()->name}}</a>
                            </h3>
                            <ul class="entry__meta">
                            Mengkomentari pada <a href="">{{$feedcomment->feeds->name}}</a> {{$controller->tanggal($recentUser->created_at)}}
                            </ul>
                          </div>
                        </article>
                      </li>
                      @endforeach
                    </ul>
                  </div> --}}

                </div> <!-- end tab content -->
              </div> <!-- end tabs -->
            </div> <!-- end widget popular/latest posts -->

            <!-- Widget Tags -->
            {{-- <div class="widget widget_tag_cloud">
              <h4 class="widget-title">Tags</h4>
              <div class="tagcloud">
                <a href="#">Magazine</a>
                <a href="#">Creative</a>
                <a href="#">Responsive</a>
                <a href="#">Modern</a>
                <a href="#">Tech</a>
                <a href="#">WordPress</a>
                <a href="#">Website</a>
                <a href="#">News</a>
              </div>
            </div> --}}

            <div class="widget">
                <h4 class="widget-title">Peta</h4>
                    <div id="map"></div>
              </div>

          </aside> <!-- end sidebar -->


<script src="http://maps.google.com/maps/api/js?key=AIzaSyD_eiIH24e4fILRNWijlDHOMpo4dbVelJY"></script>
<script src="{{ asset('js/gmaps.js') }}"></script>
<style type="text/css">
    .user-panel>.image>img {
    width: 100%;
    max-width: 150px;
    height: auto;
    margin: 0 auto;
    display: block;
    }
    #map {
    width: 100%;
    height: 400px;
    }
    </style>

<script>
            var map = new GMaps({
              el: '#map',
              zoom: 12,
              lat: -6.9611102,
              lng: 111.4038343
          });

            @foreach($maps as $map)
            map.addMarker({
                lat: '{{$map->latitude}}',
                lng: '{{$map->longitude}}',
                title: '{{$map->name}}',
                icon: '{{ asset('images/maps/icon-school.png') }}',
                infoWindow: {
                    content : '<h3>{{$map->name}}</h3><p>{{$map->description}}</p>'
                }
            });
            @endforeach
</script>


