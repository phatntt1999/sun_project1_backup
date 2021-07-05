@extends('layouts.app_body')
@section('header')
@include('header.header_user')
<!-- end:header-top -->
@include('header.header_search')
@endsection
@section('content')
<!-- Hot Tours -->
<div id="fh5co-tours" class="fh5co-section-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
				<h3>{{ trans('messages.hot_tour') }}</h3>
				<p>{{ trans('messages.quote_tour') }}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
				<div href="#"><img src="{{ asset('assets/images/destinations/h.jpg') }}" alt="" class="img-responsive">
					<div class="desc">
						<span></span>
						<h3>Huế</h3>
						<span class="price">1,000,000VNĐ</span>
						<a class="btn btn-primary btn-outline" href="#">{{ trans('messages.book_now') }} <i class="icon-arrow-right22"></i></a>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
				<div href="#"><img src="{{ asset('assets/images/destinations/da-nang2.jpg') }}" alt="" class="img-responsive">
					<div class="desc">
						<span></span>
						<h3>Đà Nẵng</h3>
						<span class="price">1,500,000VNĐ</span>
						<a class="btn btn-primary btn-outline" href="#">{{ trans('messages.book_now') }}<i class="icon-arrow-right22"></i></a>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
				<div href="#"><img src="{{ asset('assets/images/destinations/hoian2.jpg') }}" alt="" class="img-responsive">
					<div class="desc">
						<span></span>
						<h3>Hội An</h3>
						<span class="price">2,000,000VNĐ</span>
						<a class="btn btn-primary btn-outline" href="#">{{ trans('messages.book_now') }}<i class="icon-arrow-right22"></i></a>
					</div>
				</div>
			</div>
			<div class="col-md-12 text-center animate-box">
				<p><a class="btn btn-primary btn-outline btn-lg" href="{{ route('tours.index') }}">{{ trans('messages.see_all_offer') }}<i class="icon-arrow-right22"></i></a></p>
			</div>
		</div>
	</div>
</div>
<div id="fh5co-features">
	<div class="container">
		<div class="row">
			<div class="col-md-4 animate-box">
				<div class="feature-left">
					<span class="icon">
						<i class="icon-hotairballoon"></i>
					</span>
					<div class="feature-copy">
						<h3>Family Travel</h3>
						<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
						<p><a href="#">Learn More</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-4 animate-box">
				<div class="feature-left">
					<span class="icon">
						<i class="icon-search"></i>
					</span>
					<div class="feature-copy">
						<h3>Travel Plans</h3>
						<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
						<p><a href="#">Learn More</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-4 animate-box">
				<div class="feature-left">
					<span class="icon">
						<i class="icon-wallet"></i>
					</span>
					<div class="feature-copy">
						<h3>Honeymoon</h3>
						<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
						<p><a href="#">Learn More</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 animate-box">
				<div class="feature-left">
					<span class="icon">
						<i class="icon-wine"></i>
					</span>
					<div class="feature-copy">
						<h3>Business Travel</h3>
						<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
						<p><a href="#">Learn More</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-4 animate-box">
				<div class="feature-left">
					<span class="icon">
						<i class="icon-genius"></i>
					</span>
					<div class="feature-copy">
						<h3>Solo Travel</h3>
						<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
						<p><a href="#">Learn More</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-4 animate-box">
				<div class="feature-left">
					<span class="icon">
						<i class="icon-chat"></i>
					</span>
					<div class="feature-copy">
						<h3>Explorer</h3>
						<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
						<p><a href="#">Learn More</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Popular Destinations-->
<div id="fh5co-destination">
	<div class="tour-fluid">
		<div class="row">
			<div class="col-md-12">
				<ul id="fh5co-destination-list" class="animate-box">
					<li class="one-forth text-center" style="background-image: url(assets/images/destinations/da-nang.jpg); ">
						<a href="#">
							<div class="case-studies-summary">
								<h2>Da Nang</h2>
							</div>
						</a>
					</li>
					<li class="one-forth text-center" style="background-image: url(assets/images/destinations/hoian.png); ">
						<a href="#">
							<div class="case-studies-summary">
								<h2>Hoi An</h2>
							</div>
						</a>
					</li>
					<li class="one-forth text-center" style="background-image: url(assets/images/destinations/h.jpg); ">
						<a href="#">
							<div class="case-studies-summary">
								<h2>Hue</h2>
							</div>
						</a>
					</li>
					<li class="one-forth text-center" style="background-image: url(assets/images/destinations/quangbinh.jpg); ">
						<a href="#">
							<div class="case-studies-summary">
								<h2>Quang Binh</h2>
							</div>
						</a>
					</li>
					<li class="one-forth text-center" style="background-image: url(assets/images/destinations/hcm.jpg); ">
						<a href="#">
							<div class="case-studies-summary">
								<h2>Ho Chi Minh City</h2>
							</div>
						</a>
					</li>
					<li class="one-half text-center">
						<div class="title-bg">
							<div class="case-studies-summary">
								<h2>{{ trans('messages.pop_des') }}</h2>
								<span><a href="{{ route('tours.index') }}">{{ trans('messages.view_all_des') }}</a></span>
							</div>
						</div>
					</li>
					<li class="one-forth text-center" style="background-image: url(assets/images/destinations/hanoi.jpg); ">
						<a href="#">
							<div class="case-studies-summary">
								<h2>Ha Noi</h2>
							</div>
						</a>
					</li>
					<li class="one-forth text-center" style="background-image: url(assets/images/destinations/nhatrang.jpg); ">
						<a href="#">
							<div class="case-studies-summary">
								<h2>Nha Trang</h2>
							</div>
						</a>
					</li>
					<li class="one-forth text-center" style="background-image: url(assets/images/destinations/phanthiet.jpg); ">
						<a href="#">
							<div class="case-studies-summary">
								<h2>Phan Thiet</h2>
							</div>
						</a>
					</li>
					<li class="one-forth text-center" style="background-image: url(assets/images/destinations/halong.jpg); ">
						<a href="#">
							<div class="case-studies-summary">
								<h2>Ha Long</h2>
							</div>
						</a>
					</li>
					<li class="one-forth text-center" style="background-image: url(assets/images/destinations/sapa.jpg); ">
						<a href="#">
							<div class="case-studies-summary">
								<h2>Sa Pa</h2>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!-- Blog-->
<div id="fh5co-blog-section" class="fh5co-section-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
				<h3>{{ trans('messages.recent_blog') }}</h3>
				<p>“{{ trans('messages.quote_blog') }}”</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row row-bottom-padded-md">
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="fh5co-blog animate-box">
					<a href="#"><img class="img-responsive" src="{{ asset('assets/images/service/support-img.jpg') }}" alt=""></a>
					<div class="blog-text">
						<div class="prod-title">
							<h3><a href="#">30% Discount to Travel All Around the World</a></h3>
							<span class="posted_by">Sep. 15th</span>
							<span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#">{{ trans('messages.learn_more') }}</a></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="fh5co-blog animate-box">
					<a href="#"><img class="img-responsive" src="{{ asset('assets/images/service/services9.jpg') }}" alt=""></a>
					<div class="blog-text">
						<div class="prod-title">
							<h3><a href="#">Planning for Vacation</a></h3>
							<span class="posted_by">Sep. 15th</span>
							<span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#">{{ trans('messages.learn_more') }}</a></p>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix visible-sm-block"></div>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="fh5co-blog animate-box">
					<a href="#"><img class="img-responsive" src="{{ asset('assets/images/service/services7.jpg') }}" alt=""></a>
					<div class="blog-text">
						<div class="prod-title">
							<h3><a href="#">Visit Tokyo Japan</a></h3>
							<span class="posted_by">Sep. 15th</span>
							<span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#">{{ trans('messages.learn_more') }}</a></p>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix visible-md-block"></div>
		</div>
		<div class="col-md-12 text-center animate-box">
			<p><a class="btn btn-primary btn-outline btn-lg" href="{{ route('reviews.index') }}">{{ trans('messages.see_all_post') }}<i class="icon-arrow-right22"></i></a></p>
		</div>
	</div>
</div>
@endsection
