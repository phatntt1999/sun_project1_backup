@extends('layouts.admin')


<!-- Sidebar -->
@section('sidebar')
@parent

@endsection
<!-- End of Sidebar -->


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    @if (session('createSuccess'))
            @include('common.error')
            <div class="alert alert-success">
                <i class="fa fa-thumbs-up"></i>
                <h2>{{session('createSuccess')}}</h2>
            </div>
    @endif


    <!-- DataTales Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tour List</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{ route('admintours.create') }}" class="btn btn-primary btn-icon-split btn-sm btn-add-new">
                    <span class="icon">
                        <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">Add new</span>
                </a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Duration</th>
                            <th>Num.of participants</th>
                            <th>Rating</th>
                            <th>Prices</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Duration</th>
                            <th>Num.of participants</th>
                            <th>Rating</th>
                            <th>Prices</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($tours as $tour)
                        <tr>
                            <td>{{ $tour->name }}</td>
                            <td>{{ $tour->description }}</td>
                            <td>{{ $tour->duration }}</td>
                            <td>{{ $tour->num_of_participants }}</td>
                            <td>{{ $tour->rating }}</td>
                            <td>${{ $tour->price }}</td>
                            <td class="action-crud">
                                <a href="{{ route('admintours.edit', ['admintour' => $tour->id]) }}" class="btn btn-info btn-circle btn-edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="{{ route('admintours.destroy', ['admintour' => $tour->id ]) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- End of Main Content -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

@endsection

</html>
