<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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


Route::get('/posts', [PostController::class,'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');
Route::post('/posts/store', [PostController::class,'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');
// Route::get('/posts/{post}', [CommentController::class,'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class,'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class,'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('posts.destroy');


// Route::get('/comments/create', [CommentController::class,'create'])->name('comments.create');

Route::post('/comments/store', [CommentController::class,'store'])->name('comments.store');
Route::delete('/comment/{post}', [CommentController::class,'destroy'])->name('comments.destroy');


// Route::resource('posts', PostController::class);


