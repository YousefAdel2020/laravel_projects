<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'description',
        'user_id'

    ];


    //& to put the data of post owner in post object
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // //? if I do not work with naming convention you will need to add more parameter 
    // public function test()
    // {
    //     return $this->belongsTo(User::class,'user_id');
    // }


    //& to put the comments of post in post object

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    
}
