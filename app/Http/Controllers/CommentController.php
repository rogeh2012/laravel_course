<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store()
    {
        Comment::create([
            'body' => request()->body,
            'commentable_id' =>  request()->id,
            'commentable_type' => "post"
        ]);
        $id=request()->id;
        // dd(request());
        // $comments = Comment::where('commentable_id', $postId)->where('commentable_type', 'post')->get();

        return redirect()->route('posts.show',['post'=>$id]);
    }

    public function destroy($id)
    {
        $id=request()->id;
        // dd($id, request()->body);
        $comment = Comment::where('commentable_id', $id)->where('body', request()->body)->first();

        $comment->delete();

        return redirect()->route('posts.show',['post'=>$id]);
    }
}
