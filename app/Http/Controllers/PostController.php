<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //* we use (index()) ==> as naming convension for get_all_posts
    public function index()
    {
        // $allPosts = [
        //     [
        //         'id' => 1,
        //         'title' => 'Laravel',
        //         'posted_by' => 'Ahmed',
        //         'created_at' => '2022-08-01 10:00:00'
        //     ],

        //     [
        //         'id' => 2,
        //         'title' => 'PHP',
        //         'posted_by' => 'Mohamed',
        //         'created_at' => '2022-08-01 10:00:00'
        //     ],

        //     [
        //         'id' => 3,
        //         'title' => 'Javascript',
        //         'posted_by' => 'Ali',
        //         'created_at' => '2022-08-01 10:00:00'
        //     ],
        // ];


        
       //* $allPosts=Post::all(); //? select * from posts
        $allPosts=Post::paginate(10);

        //* posts.index ==> mean get the file in <index.blade.php> from directory <posts>
        return view('post.index', ['posts' => $allPosts]);
    }


    //* we use (show()) ==> as naming convension for get_post
    //* $id is take the parameter in url /posts/{post}
    public function show($id)
    {

    /*     $post =  [
            'id' => 3,
            'title' => 'Javascript',
            'posted_by' => 'Ali',
            'created_at' => '2022-08-01 10:00:00',
            'description' => 'hello description',
        ]; */

        $post= Post::find($id); //* select * from posts where id=$id limit 1;

        //? second way
        // $postCollection = Post::where('id', $id)->get(); //Collection object .... select * from posts where id = 1;

        //? third way
        // $post = Post::where('id', $id)->first(); //Post model object ... select * from posts where id = 1 limit 1;

       

        return view('post.show', ['post' => $post]);
    }


    public function create()
    {
        $users=User::all();

        return view('post.create',['users'=>$users]);
    }


    public function store(Request $request)
    {
        //&  get the form data 

        //* request() is helper method

        /* 1st way
        
            $data=request()->all();  //  get the form data in array
            dd($data);
        */

        /* 2nd way
            $data=$request->all();  
            dd($data);
        */

        // 3rd way

        $title=$request->title;
        $description=$request->description;
        $postCreator=$request->post_creator;



        //& insert the form data in database

        //* but we should put these fileds in fillable in post Model file 
        Post::create([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$postCreator
        ]);



        //! to_route() take the alias name of the route not like view()
        return to_route('posts.index');
    }


    public function edit($id)
    {
        $post= Post::find($id);
        $users=User::all();
        
        return view('post.edit',['post'=>$post,'users'=>$users]);
    }

    public function update(Request $request,$id)
    {
        
        $title=$request->title;
        $description=$request->description;
        $postCreator=$request->post_creator;

        $post=Post::findorFail($id);

        $post->update([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$postCreator
        ]);

        return to_route('posts.index');
    }


    public function destroy($id)
    {
        $post= Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'post deleted successfully');
       // return to_route('posts.index');
    }
}
