<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\BlogCategory;
use App\Http\Controllers\Controller;
use App\News;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        $data['latestUsers'] = User::orderBy('created_at', 'DESC')->get()->take(5);
        $data['latestBlogs'] = Blog::orderBy('created_at', 'DESC')->get()->take(5);
        $data['usersCount'] = User::get()->count();
        $data['newsCount'] = News::get()->count();
        $data['blogsCount'] = Blog::get()->count();
        $data['categoriesCount'] = BlogCategory::get()->count();

        return view('admin.dashboard', $data);
    }
}
