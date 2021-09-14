<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UsersPostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\DownloadFileController;
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

Route::get("/home/{post}", [HomeController::class, 'postsByHash'])->name('postsByHash');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/', function () {
return redirect()->route('home');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::post('/posts', [PostController::class, 'store']);

Route::get('/duplicate/{post:id}', [PostController::class, 'duplicate'])->name('duplicate');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');


Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');



Route::get('/users/{user:username}/posts', [UsersPostsController::class, 'index'])->name('users.posts');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/contact', [ContactUsFormController::class, 'createForm']);

Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

Route::get('get/{file_name}', [DownloadFileController::class, 'downloadFile']);



