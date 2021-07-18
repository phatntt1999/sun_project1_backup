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
            <h5 class="m-0 font-weight-bold text-primary">Review List</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @include('common.checkSave')
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Content</th>
                            <th>Category</th>
                            <th>Comments</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Content</th>
                            <th>Category</th>
                            <th>Comments</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($reviews as $review)
                        <tr>
                            <td>{{ $review->title }}</td>
                            <td>{{ $review->user->name }}</td>
                            <td>{{ $review->content }}</td>
                            <td>{{ $review->categoryReview->name_rv_cat }}</td>
                            <td>{{ $review->comments->count() }}</td>
                            <td class="action-crud">
                                <form action="{{ route('adminreviews.destroy', $review->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                        {{ $reviews->fragment('dataTable')->links() }}
                    </tbody>
                </table>
                {{ $reviews->fragment('dataTable')->links() }}
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
