<!-- JS Scripts -->

<script src="{{asset('guru/js/jquery-3.2.1.js')}}"></script>
<script src="{{asset('guru/js/jquery.appear.js')}}"></script>
<script src="{{asset('guru/js/jquery.mousewheel.js')}}"></script>
<script src="{{asset('guru/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('guru/js/jquery.matchHeight.js')}}"></script>
<script src="{{asset('guru/js/svgxuse.js')}}"></script>
<script src="{{asset('guru/js/imagesloaded.pkgd.js')}}"></script>
<script src="{{asset('guru/js/Headroom.js')}}"></script>
<script src="{{asset('guru/js/velocity.js')}}"></script>
<script src="{{asset('guru/js/ScrollMagic.js')}}"></script>
<script src="{{asset('guru/js/jquery.waypoints.js')}}"></script>
<script src="{{asset('guru/js/jquery.countTo.js')}}"></script>
<script src="{{asset('guru/js/popper.min.js')}}"></script>
<script src="{{asset('guru/js/material.min.js')}}"></script>
<script src="{{asset('guru/js/bootstrap-select.js')}}"></script>
<script src="{{asset('guru/js/smooth-scroll.js')}}"></script>
<script src="{{asset('guru/js/selectize.js')}}"></script>
<script src="{{asset('guru/js/swiper.jquery.js')}}"></script>
<script src="{{asset('guru/js/moment.js')}}"></script>
<script src="{{asset('guru/js/daterangepicker.js')}}"></script>
<script src="{{asset('guru/js/simplecalendar.js')}}"></script>
<script src="{{asset('guru/js/fullcalendar.js')}}"></script>
<script src="{{asset('guru/js/isotope.pkgd.js')}}"></script>
<script src="{{asset('guru/js/ajax-pagination.js')}}"></script>
<script src="{{asset('guru/js/Chart.js')}}"></script>
<script src="{{asset('guru/js/chartjs-plugin-deferred.js')}}"></script>
<script src="{{asset('guru/js/circle-progress.js')}}"></script>
<script src="{{asset('guru/js/loader.js')}}"></script>
<script src="{{asset('guru/js/run-chart.js')}}"></script>
<script src="{{asset('guru/js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('guru/js/jquery.gifplayer.js')}}"></script>
<script src="{{asset('guru/js/mediaelement-and-player.js')}}"></script>
<script src="{{asset('guru/js/mediaelement-playlist-plugin.min.js')}}"></script>

<script src="{{asset('guru/js/base-init.js')}}"></script>
<script defer src="{{asset('guru/fonts/fontawesome-all.js')}}"></script>
<script src="{{asset('guru/Bootstrap/dist/js/bootstrap.bundle.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    var urls = ["{{route('guru.loaddata')}}","{{route('guru.addpost')}}","{{route('guru.index')}}"];
</script>
<script src="{{asset('js/ajaxCrud.js')}}"></script>

@stack('scripts')

