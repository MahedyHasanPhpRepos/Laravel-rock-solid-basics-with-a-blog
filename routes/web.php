<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    $posts = Post::latest()->with(['category', 'user'])->get();

    return view('demo.posts', [
        'posts' => $posts
    ]);
});

Route::get('post/{post:slug}', function (Post $post) {
    return view('demo.post', [
        'post' => $post
    ]);
});



Route::get('categories/{category:slug}', function (Category $category) {

    return view('demo.posts', [
        'posts' => $category->posts->load(['category','user']) 
    ]);
});



Route::get('users/{user:username}', function (User $user) {

    return view('demo.posts', [
        'posts' => $user->posts->load(['category','user']) 
    ]);
});
