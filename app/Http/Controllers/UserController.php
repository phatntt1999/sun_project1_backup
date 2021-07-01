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
        //
    }
    public function show_edit($id)
    {
        $user = User::find($id);
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
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('tours.index')->with('error', trans('messages.not_found_tour'));
        }
        $avatar = $user->images->first();
        if (!$avatar) {
            $avatar = '/assets/images/service/default-avatar.png';
        } else {
            $avatar = $avatar->url;
        }

        return view('edit_profile', compact('user', 'avatar'));
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
        $user = User::find($id);
        $avatar = $user->images->first();
        if ($request->has('avatar')) {
            $image = $request->file('avatar');
            $path = 'assets/images/uploads/avatar/';
            $name = $image->getClientOriginalName();
            $storedPath = $image->move($path, $image->getClientOriginalName());
            if (empty($avatar)) {
                $avatar = Image::create([
                    'object_id' => $id,
                    'object_type' => 'users',
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
        $user->password = bcrypt($request->get('password'));
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
