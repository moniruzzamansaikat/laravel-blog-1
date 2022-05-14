<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class DCommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::paginate(10);
        return view('dashboard.comments.index', compact('comments'));
    }

    public function show(Comment $comment)
    {
        return view('dashboard.comments.show', compact('comment'));
    }

    public function destroy(Comment $comment)
    {
        if ($comment->delete()) {
            return back()->with("success", "Comment deleted successfully!");
        }

        return back()->with("error", "Comment could not be deleted!");
    }
}
