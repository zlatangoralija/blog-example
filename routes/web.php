<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
//Public routes


//Admin route
Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    Route::resource('users', 'Admin\AdminUserController');
    Route::resource('blogs', 'Admin\AdminBlogController');
    Route::resource('blog-categories', 'Admin\AdminBlogCategoryController');
    Route::resource('news', 'Admin\AdminNewsController');
});