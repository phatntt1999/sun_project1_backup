@extends('layouts.admin')

<!-- Sidebar -->
@section('sidebar')
@parent

@endsection
<!-- End of Sidebar -->

@section('content')
<div class="container-fluid">
    <form class="well form-horizontal" action="{{ route('admintours.update', ['admintour' => $tour->id]) }}" method="POST" id="contact_form">
        @csrf
        {{ method_field('PUT') }}

        <fieldset>
            <!-- Form Name -->
            <legend>Edit Creation</legend>

            <div class="form-group">
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-torii-gate"></i></span>
                        <select name="cat_tour_id" class="form-control selectpicker" value="{{ $tour->cat_tour_id }}">
                            <option value="">Select tour category...</option>
                            @foreach ($cat_tour as $item)
                            <option {{ $item->id == $tour->cat_tour_id ? 'selected' : '' }}
                                value="{{ $item->id }}">{{ $item->cat_name }}</option>
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
                        <input name="name" value="{{ $tour->name }}" placeholder="Tour Name..." class="form-control"
                            type="text">
                    </div>
                </div>
            </div>

            <!-- Text area -->

            <div class="form-group">
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pen"></i></span>
                        <textarea class="form-control" name="description"
                            placeholder="Say something about tour...">{{ $tour->description }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Number input-->
            <div class="form-group">
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-business-time"></i></span>
                        <input name="duration" value="{{ $tour->duration }}" placeholder="How many day is tour last?"
                            class="form-control" type="number">
                    </div>
                </div>
            </div>

            <!-- Number input-->

            <div class="form-group">
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="numOfParticipants" value="{{ $tour->num_of_participants }}"
                            placeholder="Enter number of participants..." class="form-control" type="number">
                    </div>
                </div>
            </div>

            <!-- Number input-->

            <div class="form-group">
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-donate"></i></span>
                        <input name="price" value="{{ $tour->price }}" placeholder="Enter price of tour..."
                            class="form-control" type="number">
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
