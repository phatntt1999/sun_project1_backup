@extends('layouts.admin')

<!-- Sidebar -->
@section('sidebar')
@parent

@endsection
<!-- End of Sidebar -->

@section('content')
<div class="container-fluid">
    <form class="well form-horizontal" action="{{ route('admintours.store') }}" method="POST" id="contact_form">
        @csrf
        {{-- {{ method_field('GET') }} --}}

        <fieldset>
            <!-- Form Name -->
            <legend>Tour Creation</legend>

            <div class="form-group">
                <label class="col-md-4 control-label">State</label>
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-torii-gate"></i></span>
                        <select name="cat_tour_id" class="form-control selectpicker">
                            <option value="">Select tour category...</option>
                            @foreach ($cat_tour as $item)
                            <option value="{{ $item->id }}">{{ $item->cat_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Text Name input-->

            <div class="form-group">
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fab fa-avianex"></i></span>
                        <input name="name" placeholder="Tour Name..." class="form-control" type="text">
                    </div>
                </div>
            </div>

            <!-- Text area -->

            <div class="form-group">
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pen"></i></span>
                        <textarea class="form-control" name="description"
                            placeholder="Say something about tour..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Number input-->
            <div class="form-group">
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-business-time"></i></span>
                        <input name="duration" placeholder="How many day is tour last?" class="form-control"
                            type="number">
                    </div>
                </div>
            </div>

            <!-- Number input-->

            <div class="form-group">
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="numOfParticipants" placeholder="Enter number of participants..."
                            class="form-control" type="number">
                    </div>
                </div>
            </div>

            <!-- Number input-->

            <div class="form-group">
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-donate"></i></span>
                        <input name="price" placeholder=" Enter price of tour..." class="form-control" type="number">
                    </div>
                </div>
            </div>



            <!-- Success message -->
            <div class="alert alert-success" role="alert" id="success_message">Success <i
                    class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you
                shortly.</div>

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
