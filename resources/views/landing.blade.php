<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Bimko | Landing</title>
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">
	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{asset('landing/css/bootstrap.min.css')}}" />
	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="{{asset('landing/css/owl.carousel.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{asset('landing/css/owl.theme.default.css')}}" />
	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="{{asset('landing/css/magnific-popup.css')}}" />
	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{asset('landing/css/font-awesome.min.css')}}">
	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{asset('landing/css/style.css')}}" />
</head>

<body>
	<!-- Header -->
	<header id="home">
        @include('admin.templates.partials._alerts')
		<!-- Background Image -->
		<div class="bg-img" style="background-image: {{asset('landing/img/background1.jpg')}}">
			<div class="overlay"></div>
		</div>
		<!-- /Background Image -->

		<!-- Nav -->
		<nav id="nav" class="navbar nav-transparent">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="#">
							<img class="logo" src="{{asset('landing/img/logo.png')}}" alt="">
							<img class="logo-alt" src="{{asset('landing/img/logo-alt.png')}}" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
                    <li><a href="#home">Beranda</a></li>
                    <li><a href="/login">Login</a></li>
					<li><a href="#info">Info kami</a></li>
                    <li><a href="#service">Info Layanan</a></li>
                    <li><a href="#map">Peta</a></li>

				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->

		<!-- home wrapper -->
		<div class="home-wrapper">
			<div class="container">
				<div class="row">

					<!-- home content -->
					<div class="col-md-10 col-md-offset-1">
						<div class="home-content">
							<h1 class="white-text">Sistem Informasi Guru BimKo SMK Se-Kabupaten Blora</h1>
							<p class="white-text">BimKo adalah tempat untuk berbagi mengenai informasi kuliah, pekerjaan, pengalaman, sarana konsultasi dengan guru BK. Daftar Sekarang!
							</p>
                            <a href="{{ Route('feeds.index') }}" class="white-btn">Kunjungi Web Portal</a>
                            {{-- <button class="main-btn">Login Akun</button> --}}
							<a href="{{Route('register')}}" class="main-btn" style="color:azure">Daftar Akun</a>
						</div>
					</div>
					<!-- /home content -->

				</div>
			</div>
		</div>
		<!-- /home wrapper -->

	</header>
	<!-- /Header -->


    <!-- Contact -->
	<div id="info" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">
            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">Siapa Saja Bimko?</h2>
            </div>
                <!-- /Section header -->
                <div class="col-md-10 col-md-offset-1">
                <!-- number -->
				<div class="col-sm-3 col-xs-6">
                        <div class="number">
                            <i class="fa fa-users"></i>
                            <h3 class="Black-text"><span class="counter">{{$countResponder}}</span></h3>
                            <span class="Black-text">Total Responder</span>
                        </div>
                    </div>
                    <!-- /number -->

                   <!-- number -->
				<div class="col-sm-3 col-xs-6">
                    <div class="number">
                        <i class="fa fa-users"></i>
                        <h3 class="Black-text"><span class="counter">{{$countGuru}}</span></h3>
                        <span class="Black-text">Total Guru</span>
                    </div>
                </div>
                <!-- /number -->

                    <!-- number -->
                    <div class="col-sm-3 col-xs-6">
                        <div class="number">
                            <i class="fa fa-map-marker"></i>
                            <h3 class="Black-text"><span class="counter">{{$countSchool}}</span></h3>
                            <span class="Black-text">Sekolah</span>
                        </div>
                    </div>
                    <!-- /number -->

                    <!-- number -->
                    <div class="col-sm-3 col-xs-6">
                        <div class="number">
                            <i class="fa fa-file"></i>
                            <h3 class="Black-text"><span class="counter">{{$countArticle}}</span></h3>
                            <span class="Black-text">Total Artikel</span>
                        </div>
                    </div>
                    <!-- /number -->
                    </div>
			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Contact -->

	<!-- About -->
	<div id="service" class="section md-padding bg-grey">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Apa itu BimKo?</h2>
				</div>
				<!-- /Section header -->

				<div class="col-md-10 col-md-offset-1">
                    <div class="home-content"> <center>
                        {{-- <h1 class="black-text">Sistem Informasi Guru BimKo Se-SMK Kabupaten Blora</h1> --}}
                        <p class="black-text">BimKo adalah tempat untuk berbagi informasi kuliah, pekerjaan, pengalaman, sarana konsultasi dengan guru BK.</p>
                        <p class="black-text">Di dalam Sistem Informasi ini terdapat alumni atau responder untuk memberikan informasi-informasi menarik seputar kuliah dan dunia kerja, murid untuk melihat informasi baru dan konsultasi dengan guru BK, dan guru BK untuk memberikan jawaban konsultasi.</p>
                        <p class="black-text">untuk lebih lengkapnya bisa masuk <a href="/login">disini</a><p>

                    </div>
                </div>
			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /About -->


	<!-- Why Choose Us -->
	<div id="map" class="section md-padding"></div>
		<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Why Choose Us -->

	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-dark">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<div class="col-md-12">

					<!-- footer logo -->
					<div class="footer-logo">
						<a href="/"><img src="{{asset('landing/img/logo-alt.png')}}" alt="logo"></a>
					</div>
					<!-- /footer logo -->
{{--
					<!-- footer follow -->
					<ul class="footer-follow">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
					</ul>
					<!-- /footer follow --> --}}

					<!-- footer copyright -->
					<div class="footer-copyright">
						<p>Copyright © 2019 Develop by Difka</p>
                        <p>Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
					</div>
					<!-- /footer copyright -->

				</div>

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</footer>
	<!-- /Footer -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="{{asset('landing/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('landing/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('landing/js/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('landing/js/jquery.magnific-popup.js')}}"></script>
    <script type="text/javascript" src="{{asset('landing/js/main.js')}}"></script>
    <script>
            $("#alert-danger").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert-danger").slideUp(500);
            });
    </script>
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
        height: 640px;
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
                // content : '<h3>{{$map->name}}</h3><p>{{$map->description}}</p>'
                content : '<div id="iw-container"><div class="iw-title">{{$map->name}}</div><div class="iw-content"><div class="iw-subTitle">{{$map->name}}</div><img src="{{$map->getImage()}}" alt="loading"><p align="justify">{{$map->description}}</p><div class="iw-subTitle">Informasi</div><p>{{$map->address}}<br>3830-292 Ílhavo - Portugal<br><br>Telepon. +351 234 320 600<br>e-mail: geral@vaa.pt<br>www: www.myvistaalegre.com</p></div><div class="iw-bottom-gradient"></div></div>'

            }
        });
        @endforeach
    </script>

</body>

</html>
