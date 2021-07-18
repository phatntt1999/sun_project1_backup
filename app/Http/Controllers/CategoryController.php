<?php

namespace App\Http\Controllers;

use App\Models\CategoryTour;
use App\Repositories\TourCategory\CatTourRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    protected $catTourRepo;
    public function __construct(CatTourRepositoryInterface $catTourRepo)
    {
        $this->catTourRepo = $catTourRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat_tours = $this->catTourRepo
            ->sortAndPaginate('cat_name', 'asc', config('app.default_paginate_category_admin'));

        return view('admin.listCategory', compact('cat_tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $attributes = [
            'cat_name' => $name,
        ];
        $check = $this->catTourRepo->create($attributes);
        if ($check) {
            return redirect()->route('category.create')->with('msg_success', trans('messages.save_sucess'));
        }

        return redirect()->route('category.create')->with('msg_failed', trans('messages.save_fail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat_tour = $this->catTourRepo->find($id);

        return view('admin.editCategory', compact('cat_tour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributes = [
            'cat_name' => $request->name,
        ];
        $updateCategory = $this->catTourRepo->update($id, $attributes);

        if ($updateCategory->save()) {
            return redirect()->route('category.index')->with('msg_success', trans('messages.save_sucess'));
        }

        return redirect()->route('category.index')->with('msg_fail', trans('messages.save_fail'));
    }
}
