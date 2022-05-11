<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPosts = Post::count();
        $totalComments = Comment::count();

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
