@extends('layouts.app_body')
@section('header')
@include('header.header_user')
<!-- end:header-top -->
@include('header.header_review')
@endsection
@section('content')
<!-- Blog -->
<section class="blog_area section-padding" >
	<div class="container">
		<div class="row">
			@include('common.error404')
			<div class="col-lg-8 mb-5 mb-lg-0">
				@if ($reviews)
					<div class="blog_left_sidebar" id="review_location">
						@foreach ($reviews as $review)
							<article class="blog_item">
								<div class="blog_item_img">
									@if($review->images->where('object-type','=','reviews')->first())
										<img class="card-img rounded-0" src="{{ $review->images->where('object-type','=','reviews')->first()->url  }}" alt="">
									@else
										<img class="card-img rounded-0" src="assets/images/destinations/NotFound.png" alt="">
									@endif
									<a href="#" class="blog_item_date">
										<h3>15</h3>
										<p>Jan</p>
									</a>
								</div>
								<div class="blog_details">
									<a class="d-inline-block" href="{{ route('reviews.show',$review->id) }}">
										<h2>{{ $review->title }}</h2>
									</a>
									<p>{{ $review->content1 }}</p>
									<ul class="blog-info-link">
										<li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
										<li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
									</ul>
								</div>
							</article>
						@endforeach
					{{ $reviews->fragment('review_location')->links() }}
					</div>
				@endif
			</div>
			<div class="col-lg-4">
				<div class="blog_right_sidebar">
					<aside class="single_sidebar_widget post_category_widget">
						<h4 class="widget_title">{{ trans('messages.category_blog') }}</h4>
						<ul class="list cat-list">
							<li>
								<a href="#" class="d-flex">
									<p>Resaurant food (41)</p>
								</a>
							</li>
							<li>
								<a href="#" class="d-flex">
									<p>Travel news (12)</p>
								</a>
							</li>
							<li>
								<a href="#" class="d-flex">
									<p>Modern technology (10)</p>
								</a>
							</li>
							<li>
								<a href="#" class="d-flex">
									<p>Product (08)</p>
								</a>
							</li>
							<li>
								<a href="#" class="d-flex">
									<p>Inspiration (11)</p>
								</a>
							</li>
							<li>
								<a href="#" class="d-flex">
									<p>Health Care (19)</p>
								</a>
							</li>
						</ul>
					</aside>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
