<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
        $authId = Auth::user()->id;
        $name = Auth::user()->name;

        return view('admin.dashboard', [
            'authId' => $authId,
            'name' => $name,
        ]);
    }
}
