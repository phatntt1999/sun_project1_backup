<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('role');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = Auth::user()->name;
        $users = User::orderBy('created_at', 'asc')->get();

        return view('admin.listUser', [
            'users' => $users,
            'name' => $name,
        ]);
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
        $name = $request->name;
        $email = $request->email;
        $role = $request->role;

        $user = User::find($id);
        $user->name = $name;
        $user->email =  $email;
        $user->role = $role;
        if ($user->save()) {

            return redirect()->route('user.index')->with('msg', trans('messages.save_sucess'));
        }

        return redirect()->route('user.index')->with('msg', trans('messages.save_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->delete()) {
            return redirect()->route('user.index')->with('msg', trans('messages.del_sucess'));
        }

        return redirect()->route('user.index')->with('msg', trans('messages.del_fail'));
    }
}
