<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Booking Tour</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	<!-- Styles-->
	<link rel="stylesheet" href="{{ mix('/assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/css/header.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/css/bookingform.css') }}">
	<link rel="stylesheet" href="{{ mix('/assets/css/style2.css') }}">
	<link rel="stylesheet" href="{{ mix('/assets/css/superfish.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/custom-heart.css') }}">
	<link rel="stylesheet" href="{{ asset('/bower_components/icomoon-bower/style.css') }}">
	<link rel="stylesheet" href="{{ asset('/bower_components/font-awesome/css/all.css') }}">

	<!-- JavaScript-->
	<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/total.js') }}"></script>
	<script src="{{ mix('/assets/js/modernizr-2.6.2.min.js') }}"></script>
	<script src="{{ mix('assets/js/all-js.js') }}"></script>
	<script src="{{ mix('/assets/js/main.js') }}"></script>
	<script src="{{ asset('assets/js/display_form.js') }}"></script>

</head>
<body >
<div id="fh5co-wrapper">
@yield('header')
</div>
@yield('content')
<div id="fh5co-testimonial" style="background-image:url(images/img_bg_1.jpg);">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2>{{ trans('messages.happy_clients') }}</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="box-testimony animate-box">
					<blockquote>
						<span class="quote"><span><i class="icon-quote-right"></i></span></span>
						<p>"{{ trans('messages.feedback1') }}"</p>
					</blockquote>
					<p class="author">Thao Vy</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box-testimony animate-box">
					<blockquote>
						<span class="quote"><span><i class="icon-quote-right"></i></span></span>
						<p>"{{ trans('messages.feedback2') }}"</p>
					</blockquote>
					<p class="author">Sun</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box-testimony animate-box">
					<blockquote>
						<span class="quote"><span><i class="icon-quote-right"></i></span></span>
						<p>{{ trans('messages.feedback3') }}</p>
					</blockquote>
					<p class="author">Nami</p>
				</div>
			</div>
		</div>
	</div>
</div>
<footer>
	<div id="footer">
		<div class="container">
			<div class="row row-bottom-padded-md">
				<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
					<h3>{{ trans('messages.about_travel') }}</h3>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
					<h3>{{ trans('messages.top_tour') }}</h3>
					<ul>
						<li><a href="#">Manila</a></li>
						<li><a href="#">Dubai</a></li>
						<li><a href="#">Bangkok</a></li>
						<li><a href="#">Tokyo</a></li>
						<li><a href="#">New York</a></li>
					</ul>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
					<h3>{{ trans('messages.interest') }}</h3>
					<ul>
						<li><a href="#">Beaches</a></li>
						<li><a href="#">Family Travel</a></li>
						<li><a href="#">Budget Travel</a></li>
						<li><a href="#">Food &amp; Drink</a></li>
						<li><a href="#">Honeymoon and Romance</a></li>
					</ul>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
					<h3>{{ trans('messages.best_places') }}</h3>
					<ul>
						<li><a href="#">Boracay Beach</a></li>
						<li><a href="#">Dubai</a></li>
						<li><a href="#">Singapore</a></li>
						<li><a href="#">Hongkong</a></li>
					</ul>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
					<h3>{{ trans('messages.affordable') }}</h3>
					<ul>
						<li><a href="#">Food &amp; Drink</a></li>
						<li><a href="#">Fare Flights</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center">
					<p class="fh5co-social-icons">
						<a href="#"><i class="icon-twitter-square"></i></a>
						<a href="#"><i class="icon-facebook-square"></i></a>
						<a href="#"><i class="icon-instagram"></i></a>
						<a href="#"><i class="icon-dribbble2"></i></a>
						<a href="#"><i class="icon-youtube-square"></i></a>
					</p>
				</div>
			</div>
		</div>
	</div>
</footer>
@livewireScripts
</body>
</html>
