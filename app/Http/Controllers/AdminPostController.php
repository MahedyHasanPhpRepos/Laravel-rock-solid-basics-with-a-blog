<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(4)
        ]);
    }


    public function create(Post $post)
    {


        if (auth()->guest()) {
            abort(403);
            // abort(Response::HTTP_FORBIDDEN) ; 
        }

        $categories = Category::all();

        return view('admin.posts.create', [
            'categories' => $categories
        ]);
    }


    public function store()
    {

        $data = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $data['user_id'] = auth()->id();
        $data['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        $done = Post::create($data);

        if ($done) {
            return redirect('/');
        }

    }

    public function edit(Post $post) {
        $categories = Category::all();
        return view('admin.posts.edit',['post' => $post , 'categories' => $categories]) ; 
    }

    public function update(Post $post) {

        $data = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);


        if(isset($data['thumbnail'])){
            $data['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($data) ; 

        return back()->with('success' , 'Post Updated') ; 
    }



    public function destroy(Post $post){

        $post->delete() ; 

        return back()->with('success' , 'post deleted') ; 

    }


    
}
