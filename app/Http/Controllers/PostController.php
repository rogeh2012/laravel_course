<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
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
        request()->validate([
            'title'=>['required','min:3','string','unique:posts'],
            'description'=>['required','min:10'],
        ]);

        request()->all();
        if (!User::find(request()->user_id)) {
            return back()->with('failed', 'Invalid Data');
        } else {
            Post::create([
                'title' => request()->title,
                'description' => request()->description,
                'user_id' => request()->created_by
            ]);

            return redirect('/posts');
        }
    }

    public function show($postId)
    {
        $comments = Comment::where('commentable_id', $postId)->where('commentable_type', 'post')->get();
        $post = Post::where('id', $postId)->first();

        return view('posts.show', ['postId' => $postId, 'post' => $post,'comments' => $comments]);
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
        request()->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:10']
        ]);
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
