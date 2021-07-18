<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    protected $userRepo;
    protected $imageRepo;
    public function __construct(
        UserRepositoryInterface $userRepo,
        ImageRepositoryInterface $imageRepo
    ) {
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
        $name = $this->userRepo->getCurrentUser()->name;
        $users = User::orderBy('created_at', 'asc')->get();
        $users = $this->userRepo->sortAndPaginate('name', 'asc', config('app.default_paginate_user'));

        return view('admin.listUser', [
            'users' => $users,
            'name' => $name,
        ]);
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

        return view('admin.editUser', [
            'user' => $user,
        ]);
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
        $userAttributes = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];
        $updateUser = $this->userRepo->update($id, $userAttributes);
        if ($updateUser->save()) {
            return redirect()->route('user.index')->with('msg_success', trans('messages.save_sucess'));
        }

        return redirect()->route('user.index')->with('msg_fail', trans('messages.save_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteUser = false;
        $avatarUser = $this->userRepo->find($id)->images->all();
        if (!empty($avatarUser)) {
            $imageRepo = $this->imageRepo->deleteImage($avatarUser);
            if ($imageRepo) {
                $deleteUser = $this->userRepo->delete($id);
            }
            if ($deleteUser) {
                return redirect()->route('user.index')->with('msg_success', trans('messages.delete_sucess'));
            }
        } else {
            $deleteUser = $this->userRepo->delete($id);
            if ($deleteUser) {
                return redirect()->route('user.index')->with('msg_success', trans('messages.delete_sucess'));
            }
        }

        return redirect()->route('user.index')->with('msg_fail', trans('messages.delete_fail'));
    }
}
