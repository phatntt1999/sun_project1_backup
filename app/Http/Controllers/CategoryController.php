<?php

namespace App\Http\Controllers;

use App\Models\CategoryTour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat_tours = CategoryTour::all();

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
        $check = CategoryTour::create([
            'cat_name' => $name,
        ]);
        if ($check) {

            return redirect()->route('category.create')->with('msg', trans('messages.save_sucess'));
        }

        return redirect()->route('category.create')->with('msg', trans('messages.save_fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat_tour = CategoryTour::find($id);

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
        $name = $request->name;

        $category = CategoryTour::find($id);
        $category->cat_name = $name;

        if ($category->save()) {

            return redirect()->route('category.index')->with('msg', trans('messages.save_sucess'));
        }

        return redirect()->route('category.index')->with('msg', trans('messages.save_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
