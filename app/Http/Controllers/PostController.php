<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'comments'])->latest()->get();
        return Inertia::render('Posts/Index', ['posts' => $posts]);
    }

    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $request->user()->posts()->create($request->only(['title', 'content']));
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        $post->load(['user', 'comments.user']);
        return Inertia::render('Posts/Show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->update($request->only(['title', 'content']));
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function home()
    {
        $posts = Post::with(['user', 'comments'])->latest()->get();
        return Inertia::render('Home', ['posts' => $posts]);
    }

    public function myPosts()
    {
        $posts = Post::where('user_id', auth()->id())
            ->with(['user', 'comments'])
            ->latest()
            ->get();
        return Inertia::render('Posts/MyPosts', ['posts' => $posts]);
    }
}
