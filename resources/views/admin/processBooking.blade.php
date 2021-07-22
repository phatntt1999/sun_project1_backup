@extends('layouts.admin')

<!-- Sidebar -->
@section('sidebar')
@parent
@endsection
<!-- End of Sidebar -->

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">List Inapproved Booking Requests</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @include('common.checkSave')
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tour Name</th>
                            <th>Start Date</th>
                            <th>Duration</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Customer</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tour name</th>
                            <th>Start date</th>
                            <th>Duration</th>
                            <th>Quantity</th>
                            <th>Total price</th>
                            <th>Customer</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($bookingReqs as $bookingReq)
                        <tr>
                            <td>{{ $bookingReq->tour->name }}</td>
                            <td>{{ $bookingReq->booking_start_date }}</td>
                            <td>{{ $bookingReq->duration }}</td>
                            <td>{{ $bookingReq->quantity }}</td>
                            <td>{{ $bookingReq->total_price }}</td>
                            <td>{{ $bookingReq->user->name }}</td>
                            <td class="action-crud">
                                <a href="{{ route('approveBooking', $bookingReq->id) }}"
                                    class="btn btn-success btn-circle btn-edit">
                                    <i class="fas fa-check"></i>
                                </a>
                                <a href="{{ route('rejectBooking', $bookingReq->id) }}"
                                    class="btn btn-danger btn-circle btn-edit">
                                    <i class="fas fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $bookingReqs->fragment('table')->links() }}
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
