<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditProfileRequest;
use App\Models\User;
use App\Models\Image;
use App\Repositories\Image\ImageRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepo;
    protected $imageRepo;

    public function __construct(UserRepositoryInterface $userRepo, ImageRepositoryInterface $imageRepo)
    {
        $this->userRepo = $userRepo;
        $this->imageRepo = $imageRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->userRepo->getCurrentUser();
        $avatar = $user->images->first();

        return view('profile', compact('user', 'avatar'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepo->getCurrentUser();
        $reviews = $user->reviews->all();
        $avatar = $user->images->first();

        return view('manage_review', compact('user', 'reviews', 'avatar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepo->getCurrentUser();
        $avatar = $user->images->first();

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
        $user = $this->userRepo->getCurrentUser();
        $avatar = $user->images->first();
        if ($request->has('avatar')) {
            $image = $request->file('avatar');
            $path = 'assets/images/uploads/avatar/';
            $name = $image->getClientOriginalName();
            $storedPath = $image->move($path, $image->getClientOriginalName());
            if (empty($avatar)) {
                $attributesAvatar = [
                    'imageable_id' => $id,
                    'imageable_type' => 'users',
                    'url' => $path . $name,
                ];
                $this->imageRepo->create($attributesAvatar);
            } else {
                $avatar->url =  $path . $name;
                $avatar->save();
            }
        }
        if ($request->has('password')) {
            $password = bcrypt($request->get('password'));
            $attributes = [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => $password,
            ];
        }
        dd($attributes);
        $result = $this->userRepo->update($user->id, $attributes);
        if ($result) {
            return back()->with('msg', trans('messages.save_sucess'));
        }

        return back()->with('msg', trans('messages.save_fail'));
    }
}
