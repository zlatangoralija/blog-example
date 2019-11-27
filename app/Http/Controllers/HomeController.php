<?php

namespace App\Http\Controllers;

use App\Blog;
use App\News;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data['news'] = News::where('user_id', Auth::user()->id)->get();
        $data['blogs'] = Blog::where('user_id', Auth::user()->id)->get();
        return view('dashboard', $data);
    }
}
