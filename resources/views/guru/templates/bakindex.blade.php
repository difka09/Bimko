<!DOCTYPE html>
<html lang="en">
{{-- <head>

	<title>Newsfeed</title>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Main Font -->
	<script src="{{asset('guru/js/webfontloader.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {
				families: ['Roboto:300,400,500,700:latin']
			}
		});
	</script>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('guru/Bootstrap/dist/css/bootstrap-reboot.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('guru/Bootstrap/dist/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('guru/Bootstrap/dist/css/bootstrap-grid.css')}}">

	<!-- Main Styles CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('guru/css/main.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('guru/css/fonts.min.css')}}">


</head> --}}
<body>






<!-- Header-BP -->



<!-- ... end Header-BP -->



<div class="header-spacer"></div>


<div class="container">
	<div class="row">

		<!-- Main Content -->



		<!-- ... end Main Content -->


		<!-- Left Sidebar -->


		<!-- ... end Left Sidebar -->


		<!-- Right Sidebar -->



		<!-- ... end Right Sidebar -->

	</div>
</div>


<!-- Window-popup Update Header Photo -->

<div class="modal fade" id="update-header-photo" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">
	<div class="modal-dialog window-popup update-header-photo" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Update Header Photo</h6>
			</div>

			<div class="modal-body">
				<a href="#" class="upload-photo-item">
				<svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>

				<h6>Upload Photo</h6>
				<span>Browse your computer.</span>
			</a>

				<a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

			<svg class="olymp-photos-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-photos-icon"></use></svg>

			<h6>Choose from My Photos</h6>
			<span>Choose from your uploaded photos</span>
		</a>
			</div>
		</div>
	</div>
</div>


<!-- ... end Window-popup Update Header Photo -->

<!-- Window-popup Choose from my Photo -->

<div class="modal fade" id="choose-from-my-photo" tabindex="-1" role="dialog" aria-labelledby="choose-from-my-photo" aria-hidden="true">
	<div class="modal-dialog window-popup choose-from-my-photo" role="document">

		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-header">
				<h6 class="title">Choose from My Photos</h6>

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">
							<svg class="olymp-photos-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-photos-icon"></use></svg>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">
							<svg class="olymp-albums-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-albums-icon"></use></svg>
						</a>
					</li>
				</ul>
			</div>

			<div class="modal-body">
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">

						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="img/choose-photo1.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="img/choose-photo2.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="img/choose-photo3.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>

						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="img/choose-photo4.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="img/choose-photo5.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="img/choose-photo6.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>

						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="img/choose-photo7.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="img/choose-photo8.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="img/choose-photo9.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>


						<a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
						<a href="#" class="btn btn-primary btn-lg btn--half-width">Confirm Photo</a>

					</div>
					<div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">

						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="img/choose-photo10.jpg" alt="photo">
								<figcaption>
									<a href="#">South America Vacations</a>
									<span>Last Added: 2 hours ago</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="img/choose-photo11.jpg" alt="photo">
								<figcaption>
									<a href="#">Photoshoot Summer 2016</a>
									<span>Last Added: 5 weeks ago</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="img/choose-photo12.jpg" alt="photo">
								<figcaption>
									<a href="#">Amazing Street Food</a>
									<span>Last Added: 6 mins ago</span>
								</figcaption>
							</figure>
						</div>

						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="img/choose-photo13.jpg" alt="photo">
								<figcaption>
									<a href="#">Graffity & Street Art</a>
									<span>Last Added: 16 hours ago</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="img/choose-photo14.jpg" alt="photo">
								<figcaption>
									<a href="#">Amazing Landscapes</a>
									<span>Last Added: 13 mins ago</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="img/choose-photo15.jpg" alt="photo">
								<figcaption>
									<a href="#">The Majestic Canyon</a>
									<span>Last Added: 57 mins ago</span>
								</figcaption>
							</figure>
						</div>


						<a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
						<a href="#" class="btn btn-primary btn-lg disabled btn--half-width">Confirm Photo</a>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- ... end Window-popup Choose from my Photo -->


<a class="back-to-top" href="#">
	<img src="svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>




<!-- Window-popup-CHAT for responsive min-width: 768px -->

<div class="ui-block popup-chat popup-chat-responsive" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">

	<div class="modal-content">
		<div class="modal-header">
			<span class="icon-status online"></span>
			<h6 class="title" >Chat</h6>
			<div class="more">
				<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
				<svg class="olymp-little-delete js-chat-open"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
			</div>
		</div>
		<div class="modal-body">
			<div class="mCustomScrollbar">
				<ul class="notification-list chat-message chat-message-field">
					<li>
						<div class="author-thumb">
							<img src="img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="img/author-page.jpg" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Don’t worry Mathilda!</span>
							<span class="chat-message-item">I already bought everything</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
						</div>
					</li>
				</ul>
			</div>

			<form class="need-validation">

		<div class="form-group label-floating is-empty">
			<label class="control-label">Press enter to post...</label>
			<textarea class="form-control" placeholder=""></textarea>
			<div class="add-options-message">
				<a href="#" class="options-message">
					<svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
				</a>
				<div class="options-message smile-block">

					<svg class="olymp-happy-sticker-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-sticker-icon"></use></svg>

					<ul class="more-dropdown more-with-triangle triangle-bottom-right">
						<li>
							<a href="#">
								<img src="img/icon-chat1.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat2.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat3.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat4.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat5.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat6.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat7.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat8.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat9.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat10.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat11.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat12.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat13.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat14.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat15.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat16.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat17.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat18.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat19.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat20.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat21.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat22.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat23.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat24.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat25.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat26.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat27.png" alt="icon">
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

	</form>
		</div>
	</div>

</div>

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->

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
<div class="ui-block">
        <!-- W-Weather -->
        <div class="widget w-wethear">
            <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
            <div class="wethear-now inline-items">
                <div class="temperature-sensor">64°</div>
                <div class="max-min-temperature">
                    <span>58°</span>
                    <span>76°</span>
                </div>
                <svg class="olymp-weather-partly-sunny-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons-weather.svg#olymp-weather-partly-sunny-icon')}}"></use></svg>
            </div>
            <div class="wethear-now-description">
                <div class="climate">Partly Sunny</div>
                <span>Real Feel: <span>67°</span></span>
                <span>Chance of Rain: <span>49%</span></span>
            </div>
            <ul class="weekly-forecast">
                <li>
                    <div class="day">sun</div>
                    <svg class="olymp-weather-sunny-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons-weather.svg#olymp-weather-sunny-icon')}}"></use></svg>
                    <div class="temperature-sensor-day">60°</div>
                </li>
                <li>
                    <div class="day">mon</div>
                    <svg class="olymp-weather-partly-sunny-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons-weather.svg#olymp-weather-partly-sunny-icon')}}"></use></svg>
                    <div class="temperature-sensor-day">58°</div>
                </li>
                <li>
                    <div class="day">tue</div>
                    <svg class="olymp-weather-cloudy-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons-weather.svg#olymp-weather-cloudy-icon')}}"></use></svg>
                    <div class="temperature-sensor-day">67°</div>
                </li>
                <li>
                    <div class="day">wed</div>
                    <svg class="olymp-weather-rain-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons-weather.svg#olymp-weather-rain-icon')}}"></use></svg>

                    <div class="temperature-sensor-day">70°</div>
                </li>
                <li>
                    <div class="day">thu</div>
                    <svg class="olymp-weather-storm-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons-weather.svg#olymp-weather-storm-icon')}}"></use></svg>

                    <div class="temperature-sensor-day">58°</div>
                </li>
                <li>
                    <div class="day">fri</div>
                    <svg class="olymp-weather-snow-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons-weather.svg#olymp-weather-snow-icon')}}"></use></svg>

                    <div class="temperature-sensor-day">68°</div>
                </li>
                <li>
                    <div class="day">sat</div>

                    <svg class="olymp-weather-wind-icon-header"><use xlink:href="{{asset('guru/svg-icons/sprites/icons-weather.svg#olymp-weather-wind-icon-header')}}"></use></svg>

                    <div class="temperature-sensor-day">65°</div>
                </li>
            </ul>

            <div class="date-and-place">
                <h5 class="date">Saturday, March 26th</h5>
                <div class="place">San Francisco, CA</div>
            </div>
        </div>
        <!-- W-Weather -->
    </div>

    <div class="ui-block">
        <!-- W-Calendar -->
        <div class="w-calendar calendar-container">
            <div class="calendar">
                <header>
                    <h6 class="month">March 2017</h6>
                    <a class="calendar-btn-prev fas fa-angle-left" href="#"></a>
                    <a class="calendar-btn-next fas fa-angle-right" href="#"></a>
                </header>
                <table>
                    <thead>
                    <tr><td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td><td>San</td></tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td data-month="12" data-day="1">1</td>
                        <td data-month="12" data-day="2" class="event-uncomplited event-complited">
                            2
                        </td>
                        <td data-month="12" data-day="3">3</td>
                        <td data-month="12" data-day="4">4</td>
                        <td data-month="12" data-day="5">5</td>
                        <td data-month="12" data-day="6">6</td>
                        <td data-month="12" data-day="7">7</td>
                    </tr>
                    <tr>
                        <td data-month="12" data-day="8">8</td>
                        <td data-month="12" data-day="9">9</td>
                        <td data-month="12" data-day="10" class="event-complited">10</td>
                        <td data-month="12" data-day="11">11</td>
                        <td data-month="12" data-day="12">12</td>
                        <td data-month="12" data-day="13">13</td>
                        <td data-month="12" data-day="14">14</td>
                    </tr>
                    <tr>
                        <td data-month="12" data-day="15" class="event-complited-2">15</td>
                        <td data-month="12" data-day="16">16</td>
                        <td data-month="12" data-day="17">17</td>
                        <td data-month="12" data-day="18">18</td>
                        <td data-month="12" data-day="19">19</td>
                        <td data-month="12" data-day="20">20</td>
                        <td data-month="12" data-day="21">21</td>
                    </tr>
                    <tr>
                        <td data-month="12" data-day="22">22</td>
                        <td data-month="12" data-day="23">23</td>
                        <td data-month="12" data-day="24">24</td>
                        <td data-month="12" data-day="25">25</td>
                        <td data-month="12" data-day="26">26</td>
                        <td data-month="12" data-day="27">27</td>
                        <td data-month="12" data-day="28" class="event-uncomplited">28</td>
                    </tr>
                    <tr>
                        <td data-month="12" data-day="29">29</td>
                        <td data-month="12" data-day="30">30</td>
                        <td data-month="12" data-day="31">31</td>
                    </tr>
                    </tbody>
                </table>
                <div class="list">
                    <div id="accordion-1" role="tablist" aria-multiselectable="true" class="day-event" data-month="12" data-day="2">
                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">TODAY’S EVENTS</h6>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne-1">
                                <div class="event-time">
                                    <span class="circle"></span>
                                    <time datetime="2004-07-24T18:18">9:00am</time>
                                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
                                </div>
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-1" aria-expanded="true" aria-controls="collapseOne-1">
                                        Breakfast at the Agency<svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseOne-1" class="collapse" role="tabpanel" >
                                <div class="card-body">
                                    Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the new design project we have been working on. Cheers!
                                </div>
                                <div class="place inline-items">
                                    <svg class="olymp-add-a-place-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-add-a-place-icon')}}"></use></svg>
                                    <span>Daydreamz Agency</span>
                                </div>

                                <ul class="friends-harmonic inline-items">
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic5.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic10.jp')}}g" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic7.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic8.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic2.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li class="with-text">
                                        Will Assist
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card">

                            <div class="card-header" role="tab" id="headingTwo-1">
                                <div class="event-time">
                                    <span class="circle"></span>
                                    <time datetime="2004-07-24T18:18">9:00am</time>
                                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
                                </div>
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-1" aria-expanded="true" aria-controls="collapseTwo-1">
                                        Send the new “Olympus” project files to the Agency<svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg>
                                    </a>
                                </h5>
                            </div>

                            <div id="collapseTwo-1" class="collapse" role="tabpanel">
                                <div class="card-body">
                                    Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the new design project we have been working on. Cheers!
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree-1">
                                <div class="event-time">
                                    <span class="circle"></span>
                                    <time datetime="2004-07-24T18:18">6:30am</time>
                                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
                                </div>
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#" aria-expanded="false">
                                        Take Querty to the Veterinarian
                                    </a>
                                </h5>
                            </div>
                            <div class="place inline-items">
                                <svg class="olymp-add-a-place-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-add-a-place-icon')}}"></use></svg>
                                <span>Daydreamz Agency</span>
                            </div>
                        </div>

                        <a href="#" class="check-all">Check all your Events</a>
                    </div>

                    <div id="accordion-2" role="tablist" aria-multiselectable="true" class="day-event" data-month="12" data-day="10">
                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">TODAY’S EVENTS</h6>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne-2">
                                <div class="event-time">
                                    <span class="circle"></span>
                                    <time datetime="2004-07-24T18:18">9:00am</time>
                                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
                                </div>
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-2" aria-expanded="true" aria-controls="collapseOne-2">
                                        Breakfast at the Agency<svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg>
                                    </a>
                                </h5>
                        </div>

                            <div id="collapseOne-2" class="collapse" role="tabpanel">
                                <div class="card-body">
                                    Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the new design project we have been working on. Cheers!
                                </div>
                                <div class="place inline-items">
                                    <svg class="olymp-add-a-place-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-add-a-place-icon')}}"></use></svg>
                                    <span>Daydreamz Agency</span>
                                </div>

                                <ul class="friends-harmonic inline-items">
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic5.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic10.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic7.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic8.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic2.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li class="with-text">
                                        Will Assist
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="#" class="check-all">Check all your Events</a>
                    </div>

                    <div id="accordion-3" role="tablist" aria-multiselectable="true" class="day-event" data-month="12" data-day="15">
                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">TODAY’S EVENTS</h6>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne-3">
                                <div class="event-time">
                                    <span class="circle"></span>
                                    <time datetime="2004-07-24T18:18">9:00am</time>
                                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
                                </div>
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-3" aria-expanded="true" aria-controls="collapseOne-3">
                                        Breakfast at the Agency<svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg>
                                    </a>
                                </h5>
                            </div>

                            <div id="collapseOne-3" class="collapse" role="tabpanel">
                                <div class="card-body">
                                    Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the new design project we have been working on. Cheers!
                                </div>

                                <div class="place inline-items">
                                    <svg class="olymp-add-a-place-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-add-a-place-icon')}}"></use></svg>
                                    <span>Daydreamz Agency</span>
                                </div>

                                <ul class="friends-harmonic inline-items">
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic5.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic10.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic7.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic8.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic2.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li class="with-text">
                                        Will Assist
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo-3">
                                <div class="event-time">
                                    <span class="circle"></span>
                                    <time datetime="2004-07-24T18:18">12:00pm</time>
                                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
                                </div>
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-3" aria-expanded="true" aria-controls="collapseTwo-3">
                                        Send the new “Olympus” project files to the Agency<svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg>
                                    </a>
                                </h5>
                            </div>

                            <div id="collapseTwo-3" class="collapse" role="tabpanel" >
                                <div class="card-body">
                                    Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the new design project we have been working on. Cheers!
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree-3">
                                <div class="event-time">
                                    <span class="circle"></span>
                                    <time datetime="2004-07-24T18:18">6:30pm</time>
                                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
                                </div>
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#" aria-expanded="false">
                                        Take Querty to the Veterinarian
                                    </a>
                                </h5>
                            </div>
                            <div class="place inline-items">
                                <svg class="olymp-add-a-place-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-add-a-place-icon')}}"></use></svg>
                                <span>Daydreamz Agency</span>
                            </div>
                        </div>

                        <a href="#" class="check-all">Check all your Events</a>
                    </div>

                    <div id="accordion-4" role="tablist" aria-multiselectable="true" class="day-event" data-month="12" data-day="28">
                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">TODAY’S EVENTS</h6>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne-4">
                                <div class="event-time">
                                    <span class="circle"></span>
                                    <time datetime="2004-07-24T18:18">9:00am</time>
                                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
                                </div>
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-4" aria-expanded="true" aria-controls="collapseOne-4">
                                        Breakfast at the Agency<svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg>
                                    </a>
                                </h5>
                            </div>

                            <div id="collapseOne-4" class="collapse" role="tabpanel" aria-labelledby="headingOne-4">
                                <div class="card-body">
                                    Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the new design project we have been working on. Cheers!
                                </div>
                                <div class="place inline-items">
                                    <svg class="olymp-add-a-place-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-add-a-place-icon')}}"></use></svg>
                                    <span>Daydreamz Agency</span>
                                </div>

                                <ul class="friends-harmonic inline-items">
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic5.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic10.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic7.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic8.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic2.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li class="with-text">
                                        Will Assist
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <a href="#" class="check-all">Check all your Events</a>
                    </div>

                </div>
            </div>
        </div>

        <!-- ... end W-Calendar -->
    </div>
</body>
</html>
