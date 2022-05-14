<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        
        $totalPosts = Post::where('author_id', auth()->user()->id)->count();

        // count all comments where comment's post author is the current user
        $totalComments = Comment::where('post_id', auth()->user()->id)->count();
        
        return view('dashboard.index', compact('totalPosts', 'totalComments'));
    }

    public function posts()
    {
        return view('dashboard.posts');
    }

    public function profile()
    {
        return view('dashboard.profile');
    }
}
