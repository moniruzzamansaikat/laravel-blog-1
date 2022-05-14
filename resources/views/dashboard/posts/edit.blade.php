@extends('layouts.admin') @section('title','Add Post') @section('content')

<h1 class="mb-4">Edit a post</h1>

<div class="card mb-4">
    <div class="card-body">
        <form
            action="{{ route('dashboard.posts.update', $post) }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input
                    type="text"
                    class="form-control mt-2"
                    id="title"
                    name="title"
                    placeholder="Enter title"
                    value="{{$post->title}}"
                />

                <!-- error for title -->
                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control mt-2">
                    <option value="">Select category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->
                        category_id == $category->id ? 'selected' : '' }} >
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>

                <!-- error for title -->
                @error('category')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input
                    type="file"
                    class="form-control mt-2"
                    id="image"
                    name="image"
                />

                <img
                    class="img-fluid my-2"
                    src="{{$post->image ? asset('images/' .  $post->image ) : asset('images/default_image.png')}}"
                    alt=""
                />

                <!-- error for image -->
                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <textarea
                    itemid="post-body"
                    name="body"
                    id="post-body"
                    cols="30"
                    rows="10"
                    class="form-control mt-2"
                >
                    {{ $post -> body }}
                </textarea>

                <!-- error for body -->
                @error('body')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection
