<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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


Route::get('/posts', [PostController::class,'index'])->name('posts.index')->middleware('auth');
Route::get('/posts/create', [PostController::class,'create'])->name('posts.create')->middleware('auth');
Route::post('/posts/store', [PostController::class,'store'])->name('posts.store')->middleware('auth');
Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show')->middleware('auth');
Route::get('/posts/{post}/edit', [PostController::class,'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{post}', [PostController::class,'update'])->name('posts.update')->middleware('auth');
Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('posts.destroy')->middleware('auth');



Route::post('/comments/store', [CommentController::class,'store'])->name('comments.store')->middleware('auth');
Route::delete('/comment/{post}', [CommentController::class,'destroy'])->name('comments.destroy')->middleware('auth');






// Route::resource('posts', PostController::class);
Route::get('users', [\App\Http\Controllers\UserController::class,'index']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('auth.github');

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    $user = User::updateOrCreate([
        'email' => $githubUser->email,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'password' => "df564edd56",
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);

    Auth::login($user);

    return redirect('/posts');
    // $user->token
});

Route::get('/auth/redirect-google', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.google');

Route::get('/auth/callback-google', function () {
    $googleUser = Socialite::driver('google')->user();

    $user = User::where('email', $googleUser->email)->first();

    $user = User::updateOrCreate([
        'email' => $googleUser->email,
    ], [
        'name' => $googleUser->name,
        'email' => $googleUser->email,
        'google_token' => $googleUser->token,
        'google_refresh_token' => $googleUser->refreshToken,
    ]);

    Auth::login($user);

    return redirect('/posts');
});
