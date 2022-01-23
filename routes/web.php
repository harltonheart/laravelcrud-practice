<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

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
})->name('welcome');

Auth::routes();

//Route::get('/login', [LoginController::class, 'index'])->name('login');

//Route::post('/logout', [LogoutController::class, 'store'])->name('logout');  //name('logout') which means is route('logout') in logout.blade.php
Route::get('/logout', [LogoutController::class, 'index']);  //name('logout') which means is route('logout') in logout.blade.php

Route::post('/follow/{user}', [FollowController::class, 'store']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/post', [PostController::class, 'store']);
Route::get('/post/create', [PostController::class, 'create']);
Route::get('/post/{posts}', [PostController::class, 'show']); //{{post}} means the post_id from database
Route::get('/post/{posts}/edit', [PostController::class, 'edit']); 
Route::patch('/post/{posts}', [PostController::class, 'update'])->name('update.post'); 
Route::delete('/postdelete/{posts}', [PostController::class, 'destroy']); 




Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('profiles.index');
Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{profiles}', [ProfilesController::class, 'update'])->name('profile.update');

//Route::get('/home', [HomeController::class, 'index'])->name('home');