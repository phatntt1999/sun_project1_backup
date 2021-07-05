@extends('layouts.app_body')
@section('header')
@include('header.header_user')
<!-- end:header-top -->
@include('header.header_review')
@endsection
@section('content')
<!-- Blog -->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            @if ($review)
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        @if ($images)
                            <div id="carousel-example-generic" class="carousel" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($images as $image)
                                        <div class="item {{ $loop->first ? 'active' : '' }}">
                                            <img class="img-fluid" src="{{ asset("$image->url") }}" alt="">
                                        </div>
                                    @endforeach
                                    <a class="left carousel-control" href="#carousel-example-generic" role="button"
                                        data-slide="prev">
                                        <span class="carousel-arrow-left">&#60;</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-example-generic" role="button"
                                        data-slide="next">
                                        <span class="carousel-arrow-right">&#62;</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                        <div class="blog_details">
                            <h2>{{ $review->title }}</h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class=""></i> Travel, Lifestyle</a></li>
                            </ul>
                            {{-- <p class="excert">
                                {{ $review->content1 }}
                            </p>
                            <p>
                                {{ $review->content1 }}
                            </p> --}}
                            <span>
                                {!! $review->content !!}
                            </span>
                        </div>
                    </div>
                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between">
                            <p class="like-info">
                                <div class="buttonHeart">
                                    @if (empty($liked))
                                        <button class="content 1 ">
                                            <span class="heart 1 "></span>
                                            <span class="text 1">Like</span>

                                        </button>
                                        <span class="numb 1">{{ $countLike ?? '' }} </span>
                                    @else
                                        <button class="content 1 heart-active">
                                            <span class=" heart 1 heart-active"></span>
                                            <span class="text 1 heart-active">Like</span>

                                        </button>
                                        <span class="numb 1 heart-active">{{ $countLike }}</span>
                                        <i class="user-like">People like this</i>
                                    @endif
                                </div>


                            </p>
                        </div>
                        <div class="navigation-area">
                            <div class="row">
                                <div
                                class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                <div class="thumb">
                                    <a href="#">
                                    </a>
                                </div>
                                <div class="arrow">
                                    <a href="#">
                                        <span class="lnr text-white ti-arrow-left"></span>
                                    </a>
                                </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <div class="arrow">
                                        <a href="#">
                                            <span class="lnr text-white ti-arrow-right"></span>
                                        </a>
                                    </div>
                                    <div class="thumb">
                                        <a href="#">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-author">
                        <div class="media align-items-center">
                            @if ($user->images->first())
                                <img class="avatar_reply" src="{{ asset("$user->images->first()->url") }}" alt="" />
                            @else
                                <img class="avatar_reply" src="{{ asset('/assets/images/service/default-avatar.png') }}" alt="" />
                            @endif
                            <div class="media-body">
                                <h4>{{ $user->name }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="comments-area">
                        <h4> {{ $review->comments->count() }} {{ trans('messages.comments') }}</h4>
                        @include('comment_list', ['comments' => $review->comments->whereNull('comment-parent-id'), 'review_id' => $review->id])
                    </div>
                    <div class="comment-form">
                        <h4>{{ trans('messages.leave_reply') }}</h4>
                        <form class="form-contact comment_form" action="{{ route('comments.store') }}" method="POST" id="commentForm">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="content" id="comment" cols="30" rows="9"
                                        placeholder="{{ trans('messages.write_cmt') }}" required></textarea>
                                    <input type=hidden name='review-id' value="{{ $review->id }}" />
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button button-contactForm btn_1 boxed-btn">{{ trans('messages.send_msg') }}</button>
                            </div>
                        </form>
                    </div>
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
            @endif
        </div>
    </div>
</section>
<script>
    $('.content').click(function() {
        // var review_id = {{ session('review_id') }};
        var review_id = {{ $review->id }};
        $.ajax({
            type: 'GET',
            url: "{{ route('heart') }}",

            data: {
                review_id: review_id,
            },
            success: function(result) {
                $('.numb').html(result);
            }
        });

        $('.1').toggleClass("heart-active");
    });
</script>
@endsection
