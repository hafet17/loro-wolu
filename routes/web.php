<?php

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\{HomeController, UserController};
use App\Models\{User, Post};

Auth::routes();
Route::get('/', HomeController::class)->name('home');

Route::get('{user}/post', function (User $user) {
    $posts = $user->posts;
    return view('users.index', [
        'user' => $user,
        'posts' => $posts
    ]);
});

Route::get('post/{post}', function (Post $post) {
    return view('users.post', [
        'post' => $post
    ]);
});


Route::resource('user', UserController::class);
