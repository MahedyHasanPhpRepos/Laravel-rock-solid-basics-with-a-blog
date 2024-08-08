<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::post('newsletter', function () {

    request()->validate([
        'email' => 'required|email'
    ]);

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us17'
    ]);

    try {
        $response = $mailchimp->lists->addListMember('5a2b057490', [
            "email_address" => request('email'),
            "status" => "subscribed",
        ]);
    } catch (\Exception $e) {
        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => 'This Email Could be Added To Our NewsLetter !'
        ]);
    }

    return redirect('/')->with('success', 'You are now signedup for our newsletter');
});


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('post/{post:slug}', [PostController::class, 'show']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/sessions', [SessionController::class, 'store'])->middleware('guest');


Route::post('post/{post:slug}/comment', [PostCommentController::class, 'store']);


Route::get('categories/{category:slug}', function (Category $category) {

    $categories = Category::all();

    return view('posts.posts', [
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


Route::get('admin/posts',[AdminPostController::class,'index'])->middleware('auth') ; 
Route::get('admin/posts/create',[AdminPostController::class, 'create'])->middleware('auth') ; 
Route::post('admin/posts/store',[AdminPostController::class, 'store'])->middleware('auth') ; 
Route::get('admin/posts/{post}/edit',[AdminPostController::class, 'edit'])->middleware('auth') ; 
Route::patch('admin/posts/{post}',[AdminPostController::class, 'update'])->middleware('auth') ; 
Route::delete('/admin/posts/{post}/delete',[AdminPostController::class, 'destroy'])->middleware('auth') ; 
