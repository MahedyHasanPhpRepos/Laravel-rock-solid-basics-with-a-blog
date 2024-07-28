<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('posts');
});

Route::get('post/2', function () {
    return view('post');
});

