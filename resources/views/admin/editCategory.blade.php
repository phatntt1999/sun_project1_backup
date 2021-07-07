@extends('layouts.admin')

<!-- Sidebar -->
@section('sidebar')
@parent

@endsection
<!-- End of Sidebar -->

@section('content')
<div class="container-fluid">
    <form class="well form-horizontal" action="{{ route('category.update', $cat_tour->id) }}" method="POST" id="contact_form">
        @csrf
        {{ method_field('PUT') }}

        <fieldset>
            <!-- Form Name -->
            <legend>Edit Creation</legend>

            <!-- Text Name input-->

            <div class="form-group">
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fab fa-avianex"></i></span>
                        <input name="name" required value="{{ $cat_tour->cat_name }}" placeholder="Category Name..." class="form-control"
                            type="text">
                    </div>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-warning">Send <span
                            class="glyphicon glyphicon-send"></span></button>
                </div>
            </div>

        </fieldset>
    </form>
</div>

@endsection

<!-- /.container -->
