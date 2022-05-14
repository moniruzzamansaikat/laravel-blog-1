<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DPostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('dashboard.posts', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:3',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->category_id = $request->category;
        $post->body = $request->body;
        $post->image = $imageName;
        $post->author_id = auth()->user()->id;

        $post->save();

        return redirect()->route('dashboard.posts')->with('success', 'Post created successfully');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('dashboard.posts.edit', compact('post', 'categories'));
    }

    public function update(Post $post, Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:3',
            'category' => 'required',
        ]);
 
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->category_id = $request->category;
        $post->body = $request->body;
        $post->author_id = auth()->user()->id;

        if($request->has('image')){
            // delete old image
            if($post->image && file_exists(public_path('images/' . $post->image))){ 
                unlink(public_path('images/' . $post->image));
            }
            
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $post->iamge = $imageName;
        }

        $post->update();

        return redirect()->route('dashboard.posts')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post deleted successfully');
    }
}
