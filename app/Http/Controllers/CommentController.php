<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Post $post, Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'name' => 'required',
            'email' => 'required',
        ]);

        $post->comments()->create([
            'body' => $request->body,
            'name' => $request->name,
            'email' => $request->email,
            'post_id' => $post->id,
        ]);

        return back()->with('success', 'Comment was successfully added.');
    }
}
