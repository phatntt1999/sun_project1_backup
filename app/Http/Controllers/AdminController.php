<?php

namespace App\Http\Controllers;

use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $repo;
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
        $authUser = Auth::user();

        return view('admin.dashboard', [
            'authId' => $authUser->id,
            'name' => $authUser->name,
        ]);
    }
}
