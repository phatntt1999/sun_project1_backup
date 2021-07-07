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
            <li class="nav-item"><a href="{{ route('users.show', $user->id) }}" class="nav-link">{{ trans('messages.review') }}</a></li>
            <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link active show">{{ trans('messages.about') }}</a></li>
        </ul>
    </div>
</div>
@endsection
@section('content')
<div class="profile-container-edit">
    <h1>{{ trans('messages.edit_proflie') }}</h1>
    <hr>
    <form class="form-horizontal" action="{{ route('users.update',$user->id) }}" method="POST" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="row">
            <!-- left column -->
            <div class="col-md-3">
                <div class="text-center">
                    <img src="{{ asset('/assets/images/service/upload_image.png') }}" class="avatar img-circle" alt="avatar">
                    <h6>{{ trans('messages.upload') }}...</h6>
                    <input type="file" name="avatar" class="form-control">
                    <input type="hidden" value="{{$user->id}}" name="id">
                </div>
            </div>
            <!-- edit form column -->
            <div class="col-md-9 personal-info">
                @include('common.checkSave')
                @include('common.error_edit')
                <h3>{{ trans('messages.personal_info') }}</h3>
                <div class="form-group">
                    <label class="col-lg-3 control-label">{{ trans('messages.username') }}:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="{{ $user->name }}" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="{{ $user->email }}" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">{{ trans('messages.new_pass') }}:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="password" placeholder="New Password..." name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">{{ trans('messages.confirm_pass') }}:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="password" placeholder="Confirm Password..." name="password_confirmation">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="submit" class="btn btn-primary" value="{{ trans('messages.save_change') }}">
                        <span></span>
                        <input type="reset" class="btn btn-default" value="{{ trans('messages.cancel') }}">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
