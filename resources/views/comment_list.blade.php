@foreach ($comments as $comment)
<div id="position_cmt"
    class="single-comment justify-content-between d-flex {{ $comment['comment_parent_id'] != null ? 'ml-4' : '' }}">
    <div class="user justify-content-between d-flex mb-2">
        <div class="row">
            <div class="col-md-1">
                @if (empty($comment->user->images->first()))
                    <img class="avatar_reply" src="{{ asset('/assets/images/service/default-avatar.png') }}" alt="">
                @else
                    <img class="avatar_reply" src="{{ asset($comment->user->images->first()->url ) }}" alt="">
                @endif
            </div>
            <div class="col-md-11">
                <div>
                    <h5>
                        {{ $comment->user->name }}
                    </h5>
                    <p class="date">{{ $comment->created_at ?? '' }}</p>
                    <p class="comment">
                        {{ $comment->content }}
                    </p>
                </div>
            </div>
        </div>
        <div class="desc">
            <div class="d-flex justify-content-between">
                <div class="reply-btn">
                    <button class="btn-reply text-uppercase reply_btn">{{ trans('messages.reply') }}</button>
                    <form method="post" action="{{ route('comments.store') }}" class="reply_form">
                        @csrf
                        <div class="form-group">
                            <input type=text name='content' class="form-control" required />
                            <input type=hidden name='review_id' value="{{ $review_id }}" />
                            <input type=hidden name='comment_parent_id' value="{{ $comment->id }}" />
                        </div>
                        <div class="form-group">
                            <input type=submit class="btn btn-warning" value="Reply" />
                        </div>
                    </form>
                    @include('comment_list', ['comments' => $comment->replies])
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
