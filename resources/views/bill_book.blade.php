@extends('layouts.app_body')
@section('header')
@include('header.header_user')
<!-- end:header-top -->
@include('header.header_review')
@endsection
@section('content')
<div class="container" id="position_bill">
    <div class="page-header">
        <h1>VNPAY RESPONSE</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 body-main">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4"> <img class="img" alt="Invoce Template" src="{{ asset('/assets/images/service/print.png') }}" /> </div>
                        <div class="col-md-8 text-right">
                            <h4 class="red"><strong>Travel</strong></h4>
                            <p>14 Ly Thuong Kiet, Hai Chau, Da Nang</p>
                            <p>1800-234-124</p>
                            <p>sun@gmail.com</p>
                        </div>
                    </div> <br />
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2>{{ trans('messages.invoice') }}</h2>
                        </div>
                    </div> <br />
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <h5>{{ trans('messages.invoice_id') }}</h5>
                                    </th>
                                    <th>
                                        <h5>56</h5>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-md-9">{{ trans('messages.price') }}</td>
                                    <td class="col-md-3">50,000,000 </td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">{{ trans('messages.content') }}</td>
                                    <td class="col-md-3">Thanh toan Tour </td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">{{ trans('messages.response_code') }}</td>
                                    <td class="col-md-3">007 </td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">{{ trans('messages.trans_id') }}</td>
                                    <td class="col-md-3">290200 </td>
                                </tr>
                                <tr>
                                    <td class="col-md-9">{{ trans('messages.due_date') }}</td>
                                    <td class="col-md-3">29/02/2000 </td>
                                </tr>
                                <tr class="red">
                                    <td class="text-right">
                                        <h4><strong>{{ trans('messages.status') }}:</strong></h4>
                                    </td>
                                    <td class="text-left">
                                        <h4><strong>OK</strong></h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <div class="col-md-12">
                            <p>© 2021 VNPAY</p> <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
