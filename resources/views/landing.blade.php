<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>HTML Template</title>
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
						<a href="index.html">
							<img class="logo" src="{{asset('landing/img/logo.png')}}" alt="logo">
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
					<li><a href="#register">Daftar</a></li>
					{{-- <li><a href="#portfolio">Portfolio</a></li>
					<li><a href="#service">Services</a></li>
					<li><a href="#pricing">Prices</a></li>
					<li><a href="#team">Team</a></li>
					<li class="has-dropdown"><a href="#blog">Blog</a>
						<ul class="dropdown">
							<li><a href="blog-single.html">blog post</a></li>
						</ul>
                    </li> --}}
                    <li><a href="#about">Info kami</a></li>
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
							<h1 class="white-text">Sistem Informasi Guru BimKo Se-SMK Kabupaten Blora</h1>
							<p class="white-text">BimKo adalah tempat untuk berbagi mengenai informasi kuliah, pekerjaan, pengalaman, sarana konsultasi dengan guru BK. Daftar Sekarang!
							</p>
                            <a href="{{ Route('feeds.index') }}" class="white-btn">Kunjungi Web Portal</a>
                            {{-- <button class="main-btn">Login Akun</button> --}}
							<a href="{{Route('login.users')}}" class="main-btn" style="color:azure">Login Akun</a>
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
	<div id="register" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section-header -->
				<div class="section-header text-center">
					<h2 class="title">Daftar Sebagai Responder</h2>
				</div>
				<!-- /Section-header -->

				<!-- contact form -->
				<div class="col-md-8 col-md-offset-2">
                    <form class="contact-form" action="{{Route('guest.store')}}" method="POST">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                        <input type="text" class="input" name="name" value="{{ old('name') }}" placeholder="Nama">
                        @if ($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                        @endif
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
                        <input type="email" class="input" name="email" value="{{ old('email') }}" placeholder="Email">
                        @if ($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                        @endif
                        </div>

                        <div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}">
                        <input type="password" class="input" name="password" placeholder="Kata sandi min 8 karakter">
                        @if ($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                        @endif
                        </div>

                        <div class="form-group {{ $errors->has('agency') ? 'has-error' :'' }}">
                        <input type="text" class="input" name="agency" value="{{ old('agency') }}" placeholder="Instansi:Universitas Diponegoro">
                        @if ($errors->has('agency'))
                        <p class="help-block">
                            {{ $errors->first('agency') }}
                        </p>
                        @endif
                        </div>

                        <div class="form-group {{ $errors->has('phone') ? 'has-error' :'' }}">
                        <input type="number" class="input" name="phone" value="{{ old('phone') }}" placeholder="Nomor HP">
                        @if ($errors->has('phone'))
                        <p class="help-block">
                            {{ $errors->first('phone') }}
                        </p>
                        @endif
                        </div>

						<button type="submit" class="main-btn">Daftar</button>
					</form>
				</div>
				<!-- /contact form -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Contact -->

	<!-- About -->
	<div id="about" class="section md-padding bg-grey">

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
                        <p class="black-text">untuk lebih lengkapnya bisa masuk <a href="{{Route('login.users')}}">disini</a><p>

                    </div>
                </div>
			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /About -->


	<!-- Why Choose Us -->
	<div id="map" class="section md-padding">

		<!-- Container -->
		{{-- <div class="container"> --}}

			<!-- Row -->
			{{-- <div class="row"> --}}



				{{-- <!-- why choose us content -->
				<div class="col-md-6">
					<div class="section-header">
						<h2 class="title">Why Choose Us</h2>
					</div>
					<p>Molestie at elementum eu facilisis sed odio. Scelerisque in dictum non consectetur a erat. Aliquam id diam maecenas ultricies mi eget mauris. Ultrices sagittis orci a scelerisque purus.</p>
					<div class="feature">
						<i class="fa fa-check"></i>
						<p>Quis varius quam quisque id diam vel quam elementum.</p>
					</div>
					<div class="feature">
						<i class="fa fa-check"></i>
						<p>Mauris augue neque gravida in fermentum.</p>
					</div>
					<div class="feature">
						<i class="fa fa-check"></i>
						<p>Orci phasellus egestas tellus rutrum.</p>
					</div>
					<div class="feature">
						<i class="fa fa-check"></i>
						<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
					</div>
				</div>
				<!-- /why choose us content -->

				<!-- About slider -->
				<div class="col-md-6">
					<div id="about-slider" class="owl-carousel owl-theme">
						<img class="img-responsive" src="{{asset('landing/img/about1.jpg')}}" alt="">
						<img class="img-responsive" src="{{asset('landing/img/about2.jpg')}}" alt="">
						<img class="img-responsive" src="{{asset('landing/img/about1.jpg')}}" alt="">
						<img class="img-responsive" src="{{asset('landing/img/about2.jpg')}}" alt="">
					</div>
				</div>
				<!-- /About slider --> --}}

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Why Choose Us -->


	{{-- <!-- Numbers -->
	<div id="numbers" class="section sm-padding">

		<!-- Background Image -->
		<div class="bg-img" style="background-image: {{asset('landing/img/background2.jpg')}}">
			<div class="overlay"></div>
		</div>
		<!-- /Background Image -->

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-users"></i>
						<h3 class="white-text"><span class="counter">451</span></h3>
						<span class="white-text">Happy clients</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-trophy"></i>
						<h3 class="white-text"><span class="counter">12</span></h3>
						<span class="white-text">Awards won</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-coffee"></i>
						<h3 class="white-text"><span class="counter">154</span>K</h3>
						<span class="white-text">Cups of Coffee</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-sm-3 col-xs-6">
					<div class="number">
						<i class="fa fa-file"></i>
						<h3 class="white-text"><span class="counter">45</span></h3>
						<span class="white-text">Projects completed</span>
					</div>
				</div>
				<!-- /number -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Numbers --> --}}

	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-dark">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<div class="col-md-12">

					<!-- footer logo -->
					<div class="footer-logo">
						<a href="index.html"><img src="{{asset('landing/img/logo-alt.png')}}" alt="logo"></a>
					</div>
					<!-- /footer logo -->

					<!-- footer follow -->
					<ul class="footer-follow">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
					</ul>
					<!-- /footer follow -->

					<!-- footer copyright -->
					<div class="footer-copyright">
						<p>Copyright © 2017. All Rights Reserved. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
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

</body>

</html>
