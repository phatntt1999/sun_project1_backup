@extends('layouts.app_body')
@section('header')
@include('header.header_user')
<!-- end:header-top -->
@include('header.header_review')
@endsection
@section('content')
<div id="fh5co-tours" class="fh5co-section-gray">
    <div class="modal-wrap">
        <div class="modal-header"><span class="is-active"></span><span class="is-active"></span><span
                class="is-active"></span></div>
        <div class="modal-bodies">
            <div class="modal-body modal-body-step-1 is-showing">
                <div class="title">{{ trans('messages.booking_form') }}</div>
                <div class="description">
                    <h2><b>{{ $selectedTour->name }}</b></h2>
                    <h3>{{ trans('messages.price') }}: ${{ $selectedTour->price }}</h3>
                    <h4>{{ trans('messages.duration') }}:
                        {{ $selectedTour->duration }} {{ trans('messages.days') }}
                         {{ $selectedTour->duration - 1 }} {{ trans('messages.nights') }}</h4>

                </div>
                <form class="book_form" action="{{ route('storeBookingTour') }}" method="POST">
                    @csrf
                    <input type="hidden" name="totalPrice" id="totalPrice" value="{{ $selectedTour->price }}">
                    <input type="hidden" name="tourId" value="{{ $selectedTour->id }}">
                    <input type="hidden" name="duration" value="{{ $selectedTour->duration }}">

                    {{ trans('messages.username') }}<input type="text" name="username" value="{{ $user->name }}" readonly />
                    Email<input type="email"name="email"  value="{{ $user->email }}" readonly />
                    {{ trans('messages.quantity') }} <input type="number"
                    onchange="updateCost(this.value, {{ $selectedTour->price }})"
                        id="quantity" name="quantity" min="1" max="{{ $selectedTour->num_of_participants }}"
                        value="1" />
                    {{ trans('messages.date_start') }} <input type="date" id="start" name="dateStart"
                        value="{{ date('Y-d-m') }}" />
                    <p>{{ trans('messages.total') }} : <b><span id="total">${{ $selectedTour->price }}</span></b></p>
                    <div class="text-center">
                        <input type="submit" class="button" value="{{ trans('messages.payment') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
