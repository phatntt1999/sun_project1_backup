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
            {{-- @include('common.error') --}}
            <div class="alert alert-success">
                <i class="fa fa-thumbs-up"></i>
                <h2>{{session('createSuccess')}}</h2>
            </div>
    @endif


    <!-- DataTales Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Booking Management</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <main class="container-main">
                <div class="row">
                  <div class="col-12 col-xl-8">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="d-flex justify-content-between mb-4">
                          <h2 class="mb-0 text-md">Revenue</h2>
                          <div class="form-group mb-0">
                            <label for="barChartFilter" class="sr-only">Filter revenue</label>
                            {{-- <select class="custom-select" id="barChartFilter">
                              <option disabled>Filter revenue</option>
                              <option>Daily</option>
                              <option>Weekly</option>
                              <option selected>Monthly</option>
                              <option>Yearly</option>
                            </select> --}}
                          </div> <!-- end of form-group -->
                        </div> <!-- end of d-flex -->
                        <table class="table table-bordered" id="dataTable">
                          <thead>
                              <tr>
                                  <th></th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                                  <tr>
                                    <td>Total Revenue</td>
                                    <td>{{ $total }}$</td>
                                  </tr>
                                  <tr>
                                    <td>Booking Count</td>
                                    <td>{{ $count }}</td>
                                  </tr>
                                  <tr>
                                    <td>Cancelled Booking Count</td>
                                    <td>{{ $cancel_count }}</td>
                                  </tr>
                          </tbody>
                        </table>
                      </div> <!-- end of card-body -->
                    </div> <!-- end of card -->
                  </div> <!-- end of col -->

                  <div class="col-12 col-xl-4">
                    <div class="card h-100">
                      <div class="card-body" id="same">
                        <h2 class="mb-6 text-md">Tour Revenue</h2>
                        <div class="chart-compact-square">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tour</th>
                                    <th>Revenue</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                  <th>ID</th>
                                  <th>Tour</th>
                                  <th>Revenue</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($tours as $tour)
                                    <tr>
                                      <td>{{ $tour->id }}</td>
                                      <td>{{ $tour->name }}</td>
                                      @if (empty($tour->revenue))
                                        <td>0</td>
                                      @else
                                        <td>{{ $tour->revenue }}$</td>
                                      @endif

                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                          {{ $tours->fragment('same')->links() }}
                        </div> <!-- end of chart-compact-square -->
                      </div> <!-- end of card-body -->
                    </div> <!-- end of card -->
                  </div> <!-- end of col -->
                </div> <!-- end of row -->


                <div class="card shadow mb-4" id="booking_location">
                  <div class="card-header py-3">
                      <h5 class="m-0 font-weight-bold text-primary">Booking List</h5>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          @include('common.checkSave')
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                  <tr>
                                      <th>Tour</th>
                                      <th>Quantity</th>
                                      <th>Total Price</th>
                                      <th>User</th>
                                  </tr>
                              </thead>
                              <tfoot>
                                  <tr>
                                    <th>Tour</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>User</th>
                                  </tr>
                              </tfoot>
                              <tbody>
                                  @foreach ($tours as $tour)
                                    @foreach ($tour->users as $booking)
                                      <tr>
                                        <td>{{ $tour->name }}</td>
                                        <td>{{ $booking->pivot->quantity }}</td>
                                        <td>{{ $booking->pivot->total_price }}</td>
                                        <td>{{ $booking->name }}</td>
                                      </tr>
                                    @endforeach
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
                  {{ $tours->fragment('booking_location')->links() }}
              </div>

                <footer class="row mt-3">
                  <div class="col">
                    <p class="mb-0 text-secondary">&copy; 2019 Alex Andonie. All rights reserved.</p>
                  </div>
                </footer>
              </main> <!-- end of container-fluid -->
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
