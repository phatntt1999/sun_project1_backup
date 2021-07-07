<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditProfileRequest;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('tours.index')->with('error', trans('messages.not_found_tour'));
        }
        $avatar = $user->images->first();

        return view('profile', compact('user', 'avatar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find(Auth::user()->id);
        if (!$user) {
            return redirect()->route('tours.index')->with('error', trans('messages.not_found_tour'));
        }
        $reviews = $user->reviews->all();
        $avatar = $user->images->first();

        return view('manage_review', compact('user', 'reviews', 'avatar'));
    }
    public function show_edit($id)
    {
        $user = User::find(Auth::user()->id);
        if (!$user) {
            return redirect()->route('tours.index')->with('error', trans('messages.not_found_tour'));
        }
        $avatar = $user->images->first();

        return view('edit_profile', compact('user', 'avatar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProfileRequest $request, $id)
    {
        $user = User::find(Auth::user()->id);
        $avatar = $user->images->first();
        if ($request->has('avatar')) {
            $image = $request->file('avatar');
            $path = 'assets/images/uploads/avatar/';
            $name = $image->getClientOriginalName();
            $storedPath = $image->move($path, $image->getClientOriginalName());
            if (empty($avatar)) {
                $avatar = Image::create([
                    'imageable_id' => $id,
                    'imageable_type' => 'users',
                    'url' => $path . $name,
                ]);
                $avatar->save();
            } else {
                $avatar->url =  $path . $name;
                $avatar->save();
            }
        }
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        if ($user->save()) {

            return back()->with('msg', trans('messages.save_sucess'));
        }

        return back()->with('msg', trans('messages.save_fail'));
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
