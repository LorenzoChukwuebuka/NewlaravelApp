<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogOutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostlikeController;
use App\Http\Controllers\UserPostController;

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
 
 Route::get('/',function(){
    return view('home');
})->name('home');
 Route::get('/users/{user:name}/posts',[UserPostController::class,'index'])->name('users.post');
 Route::get('/dashbord',[DashboardController::class,'index'])->name('dash')->middleware('auth');
 Route::get('/register',[registerController::class,'index'])->name('register');
 Route::post('/register',[registerController::class,'store']);

 Route::get('/login',[LoginController::class,'index'])->name('login');
 Route::post('/login',[LoginController::class,'store']);

 Route::get('/logout',[LogOutController::class,'store'])->name('logout');

 Route::get('/post',[PostController::class,'index'])->name('post');
 Route::post('/post',[PostController::class,'store']);
 Route::delete('/post/{post}',[PostController::class,'destroy'])->name('post.destroy');

 Route::post('/post/{post}/likes',[PostlikeController::class,'store'])->name('post.likes');
 Route::delete('/post/{post}/likes',[PostlikeController::class,'destroy']);
 
