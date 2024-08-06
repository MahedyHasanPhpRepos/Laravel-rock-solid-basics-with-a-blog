<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Post $post){
        // dd('hey') ; 

        // dd(request()->user()) ; 

        request()->validate([
            'body' => 'required'
        ]);

        $post->comment()->create([
            'user_id' => request()->user()->id , 
            'body' => request()->input('body')
        ]);

        return back() ; 

    }
}
