<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $post->comments()->create([
            'body' => $request->body,
            'user_id' => $request->user()->id,
        ]);

        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}
