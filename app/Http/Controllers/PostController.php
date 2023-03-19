<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //* we use (index()) ==> as naming convension for get_all_posts
    public function index()
    {
        $allPosts = [
            [
                'id' => 1,
                'title' => 'Laravel',
                'posted_by' => 'Ahmed',
                'created_at' => '2022-08-01 10:00:00'
            ],

            [
                'id' => 2,
                'title' => 'PHP',
                'posted_by' => 'Mohamed',
                'created_at' => '2022-08-01 10:00:00'
            ],

            [
                'id' => 3,
                'title' => 'Javascript',
                'posted_by' => 'Ali',
                'created_at' => '2022-08-01 10:00:00'
            ],
        ];

        //* posts.index ==> mean get the file in <index.blade.php> from directory <posts>
        return view('post.index', ['posts' => $allPosts]);
    }


    //* we use (show()) ==> as naming convension for get_post
    //* $id is take the parameter in url /posts/{post}
    public function show($id)
    {

        $post =  [
            'id' => 3,
            'title' => 'Javascript',
            'posted_by' => 'Ali',
            'created_at' => '2022-08-01 10:00:00',
            'description' => 'hello description',
        ];



        return view('post.show', ['post' => $post]);
    }


    public function create()
    {
        return view('post.create');
    }


    public function store()
    {

        //! to_route() take the alias name of the route not like view()
        return to_route('posts.index');
    }


    public function edit($id)
    {

        return view('post.edit');
    }

    public function update($id)
    {

        return to_route('posts.index');
    }


    public function destroy($id)
    {
        return to_route('posts.index');
    }
}
