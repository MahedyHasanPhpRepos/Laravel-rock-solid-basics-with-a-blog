<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    $posts = Post::latest()->with(['category', 'user'])->get();
    $categories = Category::all();

    return view('posts', [
        'posts' => $posts,
        'categories' => $categories
    ]);
});

Route::get('post/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});



Route::get('categories/{category:slug}', function (Category $category) {

    $categories = Category::all();

    return view('posts', [
        'posts' => $category->posts->load(['category', 'user']),
        'currentCategory' => $category, 
        'categories' => $categories
    ]);
});



Route::get('users/{user:username}', function (User $user) {

    $categories = Category::all();
    return view('posts', [
        'posts' => $user->posts->load(['category', 'user']),
        'categories' => $categories
    ]);
});
