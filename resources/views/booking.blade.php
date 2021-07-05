@extends('layouts.app_body')
@section('header')
@include('header.header_guess')
<!-- end:header-top -->
@include('header.header_review')
@endsection
@section('content')
<div id="fh5co-tours" class="fh5co-section-gray">
    <div class="modal-wrap">
        <div class="modal-header"><span class="is-active"></span><span class="is-active"></span><span class="is-active"></span></div>
        <div class="modal-bodies">
            <div class="modal-body modal-body-step-1 is-showing">
                <div class="title">{{ trans('messages.booking_form') }}</div>
                <div class="description">
                    <h3>Ha Long 3 Ngay 2 Dem</h3>
                    <h3>Gia tour: 1,000,000</h3>

                </div>
                <form class="book_form">
                    {{ trans('messages.username') }}<input type="text" value="" readonly/>
                    Email<input type="email" value="" readonly/>
                    {{ trans('messages.quantity') }} <input type="number" onchange="updateCost(this.value)" id="quantity" name="quantity" min="1" max="30" value=""/>
                    {{ trans('messages.date_start') }} <input type="date" id="start" name="trip-start" value="{{ date('Y-d-m') }}"/>
                    <p>{{ trans('messages.total') }} : <b><span id="total">0</span>VNĐ</b></p>
                    <div class="text-center">
                        <div class="button">{{ trans('messages.booking') }}</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<script >
function updateCost(count)
{
   var ticketCost = 5.5;
   document.getElementById("total").innerHTML = count * ticketCost;
}
</script>
