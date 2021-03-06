@extends('layouts.app_body')
@section('header')
@include('header.header_user')
<!-- end:header-top -->
<div class="fh5co-hero-review">
    <div class="profile-header">
        <div class="profile-header-cover"></div>

        <div class="profile-header-content">
            <div class="profile-header-img">
                @if (!empty($avatar))
                <img src="{{ asset("$avatar->url") }}" alt="" />
                @else
                <img src="{{ asset('/assets/images/service/default-avatar.png') }}" alt="" />
                @endif
            </div>
            <div class="profile-header-info">
                <h4 class="m-t-sm">{{ $user->name }}</h4>
                <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-xs btn-primary mb-3">{{
                    trans('messages.edit_proflie') }}</a>
            </div>
        </div>

        <ul class="profile-header-tab nav nav-tabs">
            <li class="nav-item"><a href="#profile-post" class="nav-link active show">{{ trans('messages.review') }}</a>
            </li>
            <li class="nav-item"><a href="{{ route('profile.index') }}" class="nav-link">{{ trans('messages.about')
                    }}</a></li>
        </ul>
    </div>
</div>
@endsection

@section('content')

<div class="manage-review-content">
    <div class="container">
        @include('common.checkSave')
    </div>
    @if (empty($reviews))
    <div class="none container">
        <div class="well">
            <h3>{{ trans('messages.reviews_0') }}</h3>
        </div>
    </div>
    @else

    @foreach($reviews as $review)
    <div class="container main-layout">
        <div class="well">
            <form onsubmit='return confirm("Do you want to delete this review?")'
                action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="media">
                    <div class="top-media">
                        <a class="img-manage-review" href="#">
                            @if (!empty($review->images->first()))
                            <img class="media-object" src="{{ asset($review->images->first()->url) }}">
                            @endif

                        </a>
                        <div class="left-media">
                        <h2 class="media-heading"><a href="{{ route('reviews.show',$review->id) }}"></a>
                            {{ $review->title }}</h2>
                        <p class="text-right">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </p>
                    </div>
                    </div>
            </form>
        </div>
    </div>
    @endforeach
    @endif
</div>
@endsection
