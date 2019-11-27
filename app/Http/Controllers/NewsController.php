<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\News;
use App\Repositories\FilesUpload\FilesUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->filesUpload = new FilesUpload();
        $this->path = 'news/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['news'] = News::where('user_id', Auth::user()->id)->get();
        return view('users.news.index', $data);
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

        $data['news'] = new News();
        return view('users.news.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $input = $request->input();
        $input['user_id'] = Auth::user()->id;

        //take care of the featured_image
        if ( $request->filled('featured_image') && $request->input('featured_image')) {
            $input['featured_image'] = $this->filesUpload->processFeaturedImage($request->input('featured_image'), $this->path);
        }

        News::create($input);
        return redirect()->route('news.index')->with('success', 'News created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['news'] = News::findOrFail($id);
        return view('users.news.show', $data);
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

        $data['news'] = News::findOrFail($id);
        return view('users.news.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        $input = $request->input();
        $news = News::findOrFail($id);

        //take care of the featured_image
        if ( $request->filled('featured_image') && $request->input('featured_image')) {
            if($news->featured_image){
                Storage::delete('/public/'.$news->featured_image);
            }
            $input['featured_image'] = $this->filesUpload->processFeaturedImage($request->input('featured_image'), $this->path);
        }elseif ($news->featured_image){
            $input['featured_image'] = $news->featured_image;
        }

        $news->update($input);
        return redirect()->route('news.index')->with('success', 'News updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('news.index')->with('success', 'News deleted.');
    }
}
