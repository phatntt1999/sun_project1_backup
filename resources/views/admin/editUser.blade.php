@extends('layouts.admin')

<!-- Sidebar -->
@section('sidebar')
@parent

@endsection
<!-- End of Sidebar -->

@section('content')
<div class="container-fluid">
    <form class="well form-horizontal" action="{{ route('user.update', $user->id) }}" method="POST" id="contact_form">
        @csrf
        {{ method_field('PUT') }}

        <fieldset>
            <!-- Form Name -->
            <legend>Edit Creation</legend>
            <div class="form-group">
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fab fa-avianex"></i></span>
                        <input name="name" required value="{{ $user->name }}" placeholder="User Name..." class="form-control"
                            type="text">
                    </div>
                </div>
            </div>

            <!-- Text area -->

            <div class="form-group">
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pen"></i></span>
                        <input name="email" readonly value="{{ $user->email }}" placeholder="Email..." class="form-control"
                            type="text">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-torii-gate"></i></span>
                        <select name="role" required class="form-control selectpicker" value="{{ $user->role }}">
                            <option value="">Select User Role...</option>
                            <option {{ $user->role == 'admin' ? 'selected' : '' }}
                                value="admin">Admin
                            </option>
                            <option {{ $user->role == 'user' ? 'selected' : '' }}
                                value="user">User
                            </option>
                        </select>
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
