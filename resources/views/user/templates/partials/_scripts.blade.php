<!-- jQuery Scripts -->
<script src="{{ asset('user/js/jquery.min.js') }}"></script>
<script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('user/js/easing.min.js') }}"></script>
<script src="{{ asset('user/js/owl-carousel.min.js') }}"></script>
<script src="{{ asset('user/js/twitterFetcher_min.js') }}"></script>
<script src="{{ asset('user/js/jquery.newsTicker.min.js') }}"></script>
<script src="{{ asset('user/js/modernizr.min.js') }}"></script>
<script src="{{ asset('user/js/scripts.js') }}"></script>
<script src="{{ asset('user/tinymce/tinymce.min.js') }}"></script>
@stack('select2styles')
@stack('stylecustome')
@stack('scripts')

<script src="https://maps.google.com/maps/api/js?key=AIzaSyAWVDSnVhNaCKNA3g1apoeFT5H2ITYHSRA"></script>
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
                icon: '{{ asset('images/maps/school-icon.ico') }}',
                infoWindow: {
                    content : '<div id="iw-container"><div class="iw-title">{{$map->name}}</div><div class="iw-content"><div class="iw-subTitle">{{$map->name}}</div><img src="{{$map->getImage()}}" alt="loading"><p>{{$map->description}}</p><div class="iw-subTitle">Informasi</div><p>{{$map->address}}<br></p></div><div class="iw-bottom-gradient"></div></div>'
                    // content : '<h3>{{$map->name}}</h3><p>{{$map->description}}</p>'
                }
            });
            @endforeach
</script>