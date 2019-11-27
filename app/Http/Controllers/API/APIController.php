<?php

namespace App\Http\Controllers\API;

use App\Blog;
use App\Http\Controllers\Controller;
use App\News;
use App\User;
use App\Notification;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getUsers(Request $request)
    {
        $users = new User();

        if ($request->filled('term')) {
            $term = $request['term'];
            $terms = explode(" ", $term);
            // dd($terms);
            foreach ($terms as $key => $value) {
                $users = $users
                    ->where(function ($query) use ($value) {
                        $query->where('username', 'like', '%' . $value . '%')
                            ->orWhere('email', 'like', '%' . $value . '%');
                    });
            }
        }
        $users = $users->paginate(15);
        return $users;
    }

    public function getBlogs(Request $request)
    {
        $blogs = new Blog();

        if ($request->filled('term')) {
            $term = $request['term'];
            $terms = explode(" ", $term);
            // dd($terms);
            foreach ($terms as $key => $value) {
                $blogs = $blogs
                    ->where(function ($query) use ($value) {
                        $query->where('title', 'like', '%' . $value . '%');
                    })
                    ->orWhereHas('user', function ($query) use ($value){
                        $query->where('username', 'like', '%' . $value . '%');
                    });
            }
        }
        $blogs = $blogs->with('user', 'category')->paginate(15);
        return $blogs;
    }

    public function getNews(Request $request)
    {
        $news = new News();

        if ($request->filled('term')) {
            $term = $request['term'];
            $terms = explode(" ", $term);
            // dd($terms);
            foreach ($terms as $key => $value) {
                $news = $news
                    ->where(function ($query) use ($value) {
                        $query->where('title', 'like', '%' . $value . '%');
                    })
                    ->orWhereHas('user', function ($query) use ($value){
                        $query->where('username', 'like', '%' . $value . '%');
                    });
            }
        }
        $news = $news->with('user')->paginate(15);
        return $news;
    }

    public function updateNotification(Notification $notification){
        $notification->is_read = true;
        $notification->save();
    }
}
