<?php

use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('post/{post:slug}', [PostController::class, 'show']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('/logout' , [SessionController::class, 'destroy'])->middleware('auth') ; 

Route::get('/login' , [SessionController::class, 'create'])->middleware('guest') ; 
Route::post('/sessions' , [SessionController::class, 'store'])->middleware('guest') ; 


Route::post('post/{post:slug}/comment', [PostCommentController::class, 'store']);


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
