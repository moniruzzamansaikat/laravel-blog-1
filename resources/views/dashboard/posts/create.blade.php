@extends('layouts.admin') @section('title','Add Post') @section('content')

<h1 class="mb-4">Create Post</h1>


<div class="card mb-4">
    <div class="card-body">
        <form
            action="{{ route('dashboard.posts.store') }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control mt-2" id="title"
                name="title" placeholder="Enter title" value="{{
                    old("title")
                }}" />

                <!-- error for title -->
                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="category">Category</label>
                <select
                    name="category"
                    id="category"
                    class="form-control mt-2"
                >
                    <option value="">Select category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                     > 
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
                    {{ old("body") }}
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
