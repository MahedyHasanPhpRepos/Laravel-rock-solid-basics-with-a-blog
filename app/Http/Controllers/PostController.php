<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index()
    {
        // dd(request('search')) ; 

        $posts = Post::latest()->filter(request(['search', 'category']));

        // $posts = Post::latest()->with(['category', 'user'])->get();
        $categories = Category::all();

        return view('posts.posts', [
            'posts' => $posts->paginate(3),
            'categories' => $categories,
            'currentCategory' => Category::firstWhere('slug', request('slug'))
        ]); 
    }

    public function show(Post $post)
    {

        return view('posts.post', [
            'post' => $post->load(['comment']) , 
        ]);
    }

   


    

}
