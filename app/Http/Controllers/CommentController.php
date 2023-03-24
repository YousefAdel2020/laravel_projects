<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
   


    public function store(Request $request)
    {
      $post = Post::find($request->commentable_id);

     // dd($request);
  
      $post->comments()->create($request->all());
  
      return redirect()->back();
    }
}
