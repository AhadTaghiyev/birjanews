<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Partners;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function mainpage(){

        $blogsCount = Blog::all()->count();
        $viewsCount = Blog::sum('view');
        $partnersCount = Partners::all()->count();
        $usersCount = User::all()->count();

        return view('admin.index', compact('blogsCount', 'partnersCount', 'viewsCount', 'usersCount'));
    }

}
