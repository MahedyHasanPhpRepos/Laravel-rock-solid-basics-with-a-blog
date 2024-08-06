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



    public function scopeFilter($query, array $filters)
    { //this scope's name will filter() only 

        // if (request('search') ?? false) {
        //     $query->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('body', 'like', '%' . request('search') . '%');
        // }

        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
        );

        $query->when($filters['category'] ?? false , fn($query , $category) => 
            $query->whereHas('category' , fn($query) => $query->where('slug',$category))
        );
    }

    // 

    // protected $with = ['category', 'user'] ; 

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function comment(){
        return $this->hasMany(Comment::class) ; 
    }


    // public function getRouteKeyName()
    // {
    //     return "slug" ; 
    // }

}
