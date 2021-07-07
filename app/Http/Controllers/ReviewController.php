<?php

namespace App\Http\Controllers;

use App\Models\CategoryReview;
use App\Models\Image;
use App\Models\LikeReview;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::with('images')->latest()->paginate(config('app.default_paginate_review'));
        return view('blog', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catReview = CategoryReview::all();
        return view('createReview', [
            'catReview' => $catReview,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accountId = Auth::user()->id;

        $reviewData = [
            "title"  =>  $request->titleReview,
            "content" => $request->contentReview,
            "account_id" => $accountId,
            "category_review_id" => $request->catReview,
            "count_like" => 0,
        ];
        $review  =  Review::create($reviewData);

        if ($request->has('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $path = 'assets/images/uploads/thumbnailBlog/';
            $name = $thumbnail->getClientOriginalName();
            $storedPath = $thumbnail->move($path, $name);

            $reviewImage = Image::create([
                'imageable_id' => $review->id,
                'imageable_type' => 'reviews',
                'url' => $path . $name,
            ]);
        }

        return redirect()->route('home')->with("success", trans('messages.review_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catReviews = CategoryReview::all();
        $review = Review::find($id);
        if (!$review) {
            return redirect()->route('reviews.index')->with('error', trans('messages.not_found_review'));
        }
        $images = $review->images->all();
        $user = $review->user;

        $liked = LikeReview::where('account_id', Auth::id())->where('review_id', $id)->first();
        $likeController = new LikeController;
        $countLike = $likeController->countLike($id);

        return view('single-blog', compact('review', 'images', 'user', 'liked', 'countLike', 'catReviews'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::find($id);
        if (!$review) {
            return redirect()->route('reviews.index')->with('error', trans('messages.not_found_review'));
        }
        if ($review->delete()) {

            return back()->with('msg', trans('messages.save_sucess'));
        }

        return back()->with('msg', trans('messages.save_fail'));
    }

    /**
     * Upload images into directory
     *
     */
    public function uploadImageToDir(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
