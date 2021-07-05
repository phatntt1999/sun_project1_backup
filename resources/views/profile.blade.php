@extends('layouts.app_body')
@section('header')
@include('header.header_user')
<!-- end:header-top -->
<div class="fh5co-hero-review" style="height: 400px;">
    <div class="profile-header">
        <div class="profile-header-cover"></div>

        <div class="profile-header-content">
            <div class="profile-header-img">
                @if ($avatar)
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
            <li class="nav-item"><a href="#profile-post" class="nav-link" data-toggle="tab">{{ trans('messages.review') }}</a></li>
            <li class="nav-item"><a href="#profile-about" class="nav-link active show" data-toggle="tab">{{ trans('messages.about') }}</a></li>
        </ul>
    </div>
</div>
@endsection
@section('content')
<!-- Destinations -->
<div id="fh5co-tours" class="fh5co-section-gray">
	<div class="profile-container">
        <div class="row row-space-20">
            <div class="col-md-8">
                <div class="tab-content p-0">
                    @if ($user ?? '')
                    <div class="tab-pane active show" id="profile-about">
                        <table class="table table-profile">
                            <thead>
                                <tr>
                                    <th colspan="2">{{ trans('messages.personal_info') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="field">{{ trans('messages.username') }}</td>
                                    <td class="value">
                                        <div class="m-b-5">
                                            <b>{{ $user->name }}</b><br />
                                            <span class="text-muted">PHP Programmer</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field">Email</td>
                                    <td class="value">
                                        <div class="m-b-5">
                                            <b>{{ $user->email }}</b><br />
                                            <span class="text-muted">University of Georgia, Athens, GA</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-profile">
                            <thead>
                                <tr>
                                    <th colspan="2">CONTACT INFORMATION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="field">Mobile Phones</td>
                                    <td class="value">
                                        +44 7700 900860
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field">Facebook</td>
                                    <td class="value">
                                        http://facebook.com/infinite.admin
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field">Website</td>
                                    <td class="value">
                                        http://seantheme.com
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field">Address</td>
                                    <td class="value">
                                        Twitter, Inc.<br />
                                        1355 Market Street, Suite 900<br />
                                        San Francisco, CA 94103
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-4 hidden-xs hidden-sm">
                <ul class="profile-info-list">
                    <li class="title">BASIC INFORMATION</li>
                    <li>
                        <div class="field">Occupation:</div>
                        <div class="value">UXUI / Frontend Developer</div>
                    </li>
                    <li>
                        <div class="field">Skills:</div>
                        <div class="value">C++, PHP, HTML5, CSS, jQuery, MYSQL, Ionic, Laravel, Phonegap, Bootstrap, Angular JS, Angular JS, Asp.net</div>
                    </li>
                    <li>
                        <div class="field">Birth of Date:</div>
                        <div class="value">1989/11/04</div>
                    </li>
                    <li>
                        <div class="field">Country:</div>
                        <div class="value">San Francisco</div>
                    </li>
                    <li>
                        <div class="field">Address:</div>
                        <div class="value">
                            <address class="m-b-0">
                                Twitter, Inc.<br />
                                1355 Market Street, Suite 900<br />
                                San Francisco, CA 94103
                            </address>
                        </div>
                    </li>
                    <li>
                        <div class="field">Phone No.:</div>
                        <div class="value">
                            (123) 456-7890
                        </div>
                    </li>
                    <li class="title">FRIEND LIST (9)</li>
                    <li class="img-list">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
