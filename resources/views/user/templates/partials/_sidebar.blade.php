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
                                    $controller->tanggal($popular->agreement->created_at);
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
                                    $controller->tanggal($latest->agreement->created_at);
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

    .gm-style-iw {
    width: 350px !important;
    top:83px !important;
    left: 0px !important;
    background-color: #fff;
    box-shadow: 0 1px 6px rgba(178, 178, 178, 0.6);
    border: 1px solid rgba(72, 181, 233, 0.6);
    border-radius: 2px 2px 10px 10px;
    }
    #iw-container {
    margin-bottom: 10px;
    }
    #iw-container .iw-title {
    font-family: 'Open Sans Condensed', sans-serif;
    font-size: 22px;
    font-weight: 400;
    padding: 10px;
    background-color: #48b5e9;
    color: white;
    margin: 0;
    border-radius: 2px 2px 0 0;
    }
    #iw-container .iw-content {
    font-size: 13px;
    line-height: 18px;
    font-weight: 400;
    margin-right: 1px;
    padding: 15px 5px 20px 15px;
    max-height: 140px;
    overflow-y: auto;
    overflow-x: hidden;
    }
    .iw-content img {
    float: right;
    width: 100%;
    height: 100%;
    max-width: 115px;
    max-height: 83px:;
    margin: 0 5px 5px 10px;
    }
    .iw-subTitle {
    font-size: 16px;
    font-weight: 700;
    padding: 5px 0;
    }
    .iw-bottom-gradient {
    position: absolute;
    width: 326px;
    height: 25px;
    bottom: 10px;
    right: 18px;
    background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
    background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
    background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
    background: -ms-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
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
                    content : '<div id="iw-container"><div class="iw-title">{{$map->name}}</div><div class="iw-content"><div class="iw-subTitle">{{$map->name}}</div><img src="{{$map->getImage()}}" alt="loading"><p>{{$map->description}}</p><div class="iw-subTitle">Informasi</div><p>{{$map->address}}<br>3830-292 Ílhavo - Portugal<br><br>Telepon. +351 234 320 600<br>e-mail: geral@vaa.pt<br>www: www.myvistaalegre.com</p></div><div class="iw-bottom-gradient"></div></div>'
                    // content : '<h3>{{$map->name}}</h3><p>{{$map->description}}</p>'
                }
            });
            @endforeach
</script>


