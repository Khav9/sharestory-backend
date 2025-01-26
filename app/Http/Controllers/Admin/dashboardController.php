<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class DashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Dashboard access|Dashboard create|Dashboard edit|Dashboard delete', ['only' => ['index', 'show']]);
        // $this->middleware('role_or_permission:Dashboard create', ['only' => ['create', 'store']]);
        // $this->middleware('role_or_permission:Dashboard edit', ['only' => ['edit', 'update']]);
        // $this->middleware('role_or_permission:Dashboard delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get users who have a lot of react
        $totalUser = User::where('role_id',2)->count();
        $totalPost = Post::where('publish', 1)->count();
        $totalDraft = Post::where('publish', 0)->count();
        $users = User::limit(9)->get();
    
        return view('dashboard', ['users' => $users, 'totalUser' => $totalUser, 'totalPost' => $totalPost, 'totalDraft' => $totalDraft]);
    }
    
}