<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;

use GuzzleHttp\Middleware;

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




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('/',function(){

    return view('website.home');

});

Route::get('/about',function(){

    return view('website.about');

});
Route::get('/category',function(){

    return view('website.category');

});
Route::get('/contact',function(){

    return view('website.contact');

});

Route::get('/post',function(){

    return view('website.post');

});


// Admin panel 

Route::group(['prefix'=>'admin','Middleware'=>['auth']],function(){

    Route::get('/dashboard', function(){

        return view('admin.dashboard.index');
    });

     Route::resource('category' , CategoryController::class);
     Route::resource('tag',TagController::class);
     Route::resource('post',PostController::class);
     Route::resource('user', UserController::class);

});

