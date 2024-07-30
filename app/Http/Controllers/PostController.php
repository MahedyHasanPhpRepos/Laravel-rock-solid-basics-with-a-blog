<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // dd(request('search')) ; 

        $posts = Post::latest()->filter(request(['search', 'category']));



        // $posts = Post::latest()->with(['category', 'user'])->get();
        $categories = Category::all();

        return view('posts', [
            'posts' => $posts->paginate(3),
            'categories' => $categories,
            'currentCategory' => Category::firstWhere('slug', request('slug'))
        ]); 
    }

    public function show(Post $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }
}
