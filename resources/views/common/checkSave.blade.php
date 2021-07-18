@if (session('msg_success'))
    <div class="alert alert-success">
        <i class="fa fa-thumbs-up"></i>
        <ul>
            <li><h3>{{ session('msg_success') }}</h3></li>
        </ul>
    </div>
@elseif (session('msg_fail'))
    <div class="alert alert-danger">
        <i class="fa fa-thumbs-down"></i>
        <ul>
            <li><h3>{{ session('msg_fail') }}</h3></li>
        </ul>
    </div>
@endif
