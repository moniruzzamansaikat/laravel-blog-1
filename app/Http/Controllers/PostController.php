<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $recentPosts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        $popularPosts = Post::orderBy('views', 'desc')->limit(3)->get();

        return view('pages.blog', compact('posts', 'recentPosts', 'popularPosts'));
    }

    public function show(Post $post)
    {
        // increase the views
        $post->increment('views');
        return view('blog.show', compact('post'));
    }

}
