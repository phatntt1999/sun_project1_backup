<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Review\ReviewRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewManagementController extends Controller
{
    protected $reviewRepo;
    protected $imageRepo;
    public function __construct(ReviewRepositoryInterface $reviewRepo, ImageRepositoryInterface $imageRepo)
    {
        $this->reviewRepo = $reviewRepo;
        $this->imageRepo = $imageRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = $this->reviewRepo->getCurrentUser()->name;
        $reviews = $this->reviewRepo->sortAndPaginate('created_at', 'asc', config('app.default_paginate_review'));
        return view('admin.listReview', [
            'reviews' => $reviews,
            'name' => $name,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteReview = false;
        $reviewImage = $this->reviewRepo->find($id)->images->all();
        if (!empty($reviewImage)) {
            $deleteImage = $this->imageRepo->deleteImage($reviewImage);
            if ($deleteImage) {
                $deleteReview = $this->reviewRepo->delete($id);
            }
            if ($deleteReview) {
                return redirect()->route('adminreviews.index')->with('msg_success', trans('messages.delete_sucess'));
            }
        } else {
            $deleteReview = $this->reviewRepo->delete($id);
            if ($deleteReview) {
                return redirect()->route('adminreviews.index')->with('msg_success', trans('messages.delete_sucess'));
            }
        }
        return redirect()->route('adminreviews.index')->with('msg_fail', trans('messages.delete_fail'));
    }
}
