<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Notification;
use App\Repositories\FilesUpload\FilesUpload;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{

    public function __construct()
    {
        $this->filesUpload = new FilesUpload();
        $this->path = 'users/';
        $notifications = Notification::where('is_read', false)->get();
        view()->share('notifications', $notifications);

        $scripts[] = '/js/readnotification.js';
        view()->share('scripts', $scripts);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::get();
        return view('admin.users.index', $data);
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

        $data['user'] = new User();
        return view('admin.users.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->input();

        //take care of the featured_image
        if ( $request->filled('featured_image') && $request->input('featured_image')) {
            $input['featured_image'] = $this->filesUpload->processFeaturedImage($request->input('featured_image'), $this->path);
        }

        User::create($input);
        return redirect()->route('admin.users.index')->with('success', 'User created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['user'] = User::findOrFail($id);
        return view('admin.users.show', $data);
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

        $data['user'] = User::findOrFail($id);
        return view('admin.users.edit', $data);
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
        $input = $request->input();
        $user = User::findOrFail($id);

        //take care of the featured_image
        if ( $request->filled('featured_image') && $request->input('featured_image')) {
            if($user->featured_image){
                Storage::delete('/public/'.$user->featured_image);
            }
            $input['featured_image'] = $this->filesUpload->processFeaturedImage($request->input('featured_image'), $this->path);
        }elseif ($user->featured_image){
            $input['featured_image'] = $user->featured_image;
        }

        $user->update($input);
        return redirect()->route('admin.users.index')->with('success', 'User updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted.');
    }
}
