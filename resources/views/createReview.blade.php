<!doctype html>
<html lang="en">

<head>
    <title> Laravel 8 Install CKEditor Example </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset("bower_components/bootstrap/dist/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/create-review.css") }}">
    <link rel="stylesheet" href="{{ asset('/bower_components/font-awesome/css/all.css') }}">
    {{-- CKEditor CDN --}}
    <script src="{{ asset("bower_components/ckeditor/ckeditor.js") }}"></script>
</head>

<body>
    <h1 class="title">Them review</h1>
    <!-- Text Name input-->
    <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="col-md-4 selectContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-torii-gate"></i></span>
                    <select name="catReview" class="form-control selectpicker">
                        <option value="">Select review category</option>
                        @foreach ($catReview as $item)
                            <option value="{{ $item->id }}">{{ $item->name_rv_cat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fab fa-avianex"></i></span>
                    <input name="titleReview" placeholder="Title Review..." class="form-control" type="text">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="far fa-image"></i></span>
                    <input type="file" name="thumbnail" class="form-control">
                </div>
            </div>
        </div>


        <!-- Text Content input-->
        <div class="form-group">
            <textarea name="contentReview"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('contentReview', {
            filebrowserUploadUrl: "{{ route('reviews.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
</body>

</html>
