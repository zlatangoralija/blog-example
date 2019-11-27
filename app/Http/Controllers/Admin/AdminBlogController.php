<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\BlogCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Repositories\FilesUpload\FilesUpload;
use DemeterChain\B;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    public function __construct()
    {
        $this->filesUpload = new FilesUpload();
        $this->path = 'blogs/';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blogs'] = Blog::get();
        return view('admin.blogs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $styles[] = 'https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.css';
        view()->share('styles', $styles);

        $scripts[] = 'https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js';
        $scripts[] = '/js/dropzoneinit.js';
        view()->share('scripts', $scripts);

        $data['blog'] = new Blog();
        $data['categories'] = BlogCategory::pluck('title', 'id');
        return view('admin.blogs.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $input = $request->input();
        $input['user_id'] = Auth::user()->id;

        //take care of the featured_image
        if ( $request->filled('featured_image') && $request->input('featured_image')) {
            $input['featured_image'] = $this->filesUpload->processBannerImage($request->input('featured_image'), $this->path);
        }

        Blog::create($input);
        return redirect()->route('admin.blogs.index')->with('success', 'Blog created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['blog'] = Blog::findOrFail($id);
        return view('admin.blogs.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $styles[] = 'https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.css';
        view()->share('styles', $styles);

        $scripts[] = 'https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js';
        $scripts[] = '/js/dropzoneinit.js';
        view()->share('scripts', $scripts);

        $data['blog'] = Blog::findOrFail($id);
        $data['categories'] = BlogCategory::pluck('title', 'id');
        return view('admin.blogs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $input = $request->input();

        //take care of the featured_image
        if ( $request->filled('featured_image') && $request->input('featured_image')) {
            if($blog->featured_image){
                Storage::delete('/public/'.$blog->featured_image);
            }
            $input['featured_image'] = $this->filesUpload->processBannerImage($request->input('featured_image'), $this->path);
        }elseif ($blog->featured_image){
            $input['featured_image'] = $blog->featured_image;
        }

        $blog->update($input);
        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete;
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted');
    }
}
