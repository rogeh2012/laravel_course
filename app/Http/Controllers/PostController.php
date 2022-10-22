<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = [
            ['id' => 1, 'title' => 'laravel is cool', 'posted_by' => 'Ahmed', 'creation_date' => '2022-10-22'],
            ['id' => 2, 'title' => 'PHP deep dive', 'posted_by' => 'Mohamed', 'creation_date' => '2022-10-15'],
        ];

        return view('posts.index', [
            'posts' => $allPosts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        return redirect('/posts');
    }

    public function show($postId)
    {

        return view('posts.show',['postId' => $postId]);
    }
    public function edit($postId)
    {

        return view('posts.edit',['postId' => $postId]);
    }
    public function update()
    {

        return redirect('/posts');
    }
    public function destroy($postId)
    {
        // return view('posts.delete',['postId' => $postId]);
        // dd($postId);
        return redirect('/posts');
    }
}
