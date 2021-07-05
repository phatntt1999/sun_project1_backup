<?php

namespace App\Http\Controllers;

use App\Models\LikeReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function Like(Request $request)
    {
        $Authid = Auth::id();
        $like = LikeReview::where('account_id', $Authid)->where('review_id', $request->review_id)->first();
        if (!empty($like)) {
            $deleteLike = LikeReview::where('id', $like->id);
            $deleteLike->delete();
        } else {
            $liking = new LikeReview;
            $liking->account_id = $Authid;
            $liking->like_status = 1;
            $liking->review_id = $request->review_id;
            $liking->save();
        }
        $likecontroller = new LikeController;
        return $likecontroller->countLike($request->review_id);
    }
    public function countLike($reviewId)
    {
        $liking = LikeReview::where('review_id', $reviewId)->count();
        if (!empty($liking)) {
            $liking;
        } else {
            $liking = 0;
        }
        return $liking;
    }
}
