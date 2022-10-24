<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Pagination\CursorPaginator;

class PostController extends Controller
{
    public function index()
    {
        $allPosts=Post::all();

        return view('posts.index', [
            'posts' => $allPosts,
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create', ['users' => $users]);
    }

    public function store()
    {
        // $data = request()->all();
        // dd($data);
        Post::create([
            'title' => request()->title,
            'description' => request()->description,
            'user_id' => request()->created_by
        ]);

        return redirect('/posts');
    }

    public function show($postId)
    {
        $post = Post::where('id', $postId)->first();

        return view('posts.show', ['postId' => $postId, 'post' => $post]);
    }

    public function edit($postId)
    {

        $users = User::all();

        $post = Post::where('id', $postId)->first();
        // dd($postId);
        return view('posts.edit', ['postId' => $postId, 'post' => $post,'users' => $users]);
    }
    public function update($postId)
    {
        $post = Post::find($postId);

        $post->title = request()->title;
        $post->description = request()->description;
        $post->user_id = request()->created_by;

        $post->save();
        return redirect('/posts');
    }
    public function destroy($postId)
    {
        $post = Post::find($postId);

        $post->delete();

        return redirect('/posts');
    }
}
