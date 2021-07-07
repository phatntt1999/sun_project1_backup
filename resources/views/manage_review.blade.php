@extends('layouts.app_body')
@section('header')
@include('header.header_user')
<!-- end:header-top -->
<div class="fh5co-hero-review" style="height: 400px;">
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
                <a href="{{ route('edit_profile', $user->id) }}" class="btn btn-xs btn-primary mb-3">{{ trans('messages.edit_proflie') }}</a>
            </div>
        </div>

        <ul class="profile-header-tab nav nav-tabs">
            <li class="nav-item"><a href="#profile-post" class="nav-link active show">{{ trans('messages.review') }}</a></li>
            <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link">{{ trans('messages.about') }}</a></li>
        </ul>
    </div>
</div>
@endsection
@section('content')
<div class="">
    @if (empty($reviews))
        <div class="none container">
            <div class="well">
                <h3>{{ trans('messages.reviews_0') }}</h3>
            </div>
        </div>
    @else
        @foreach($reviews as $review)
            <div class="none container">
                <div class="well">
                    <form onsubmit='return confirm("Do you want to delete this user?");' action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="media">
                            <a class="pull-left" href="#">
                                @if (!empty($review->images->first()))
                                    <img class="media-object" src="{{ asset($review->images->first()->url) }}">
                                @endif
                            </a>
                            <div class="media-body">
                            <h3><a href="{{ route('reviews.show',$review->id) }}" class="media-heading">{{ $review->title }}</a></h3>
                            <p class="text-right">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </p>
                            <p>{{ $review->content1 }}</p>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
