<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('post/{post:slug}', [PostController::class, 'show']);



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
