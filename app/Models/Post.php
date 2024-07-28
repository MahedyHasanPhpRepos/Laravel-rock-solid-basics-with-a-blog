<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "excerpt",
        "body",
        'published_at'
    ];


    // protected $with = ['category', 'user'] ; 

    public function category(){
        return $this->belongsTo(Category::class) ; 
    }

    public function user(){
        return $this->belongsTo(User::class) ; 
    }


    // public function getRouteKeyName()
    // {
    //     return "slug" ; 
    // }

}
