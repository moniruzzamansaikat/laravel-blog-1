@extends('layouts.admin') @section('title', 'Posts') @section('content')
<h1>Posts</h1>

<div class="card mb-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->author->name}}</td>
                        <td>
                            {{$post->category ? $post->category->name : 'Uncategorized'}}
                        </td>
                        <td>{{$post->title}}</td>
                        <td>
                            <a
                                href="{{
                                    route('dashboard.posts.edit', $post)
                                }}"
                                class="btn btn-sm btn-primary"
                                >Edit</a
                            >
                            <a
                                href="#"
                                class="btn btn-sm btn-primary post_show_button"
                                data-postId="{{$post->id}}"
                                >Show</a
                            >
                            <form
                                action="{{
                                    route('dashboard.posts.destroy', $post)
                                }}"
                                class="d-inline"
                                method="post"
                            >
                                @csrf @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                >
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- simple show drawer -->
<div class="post_show_drawer">
    <button>&times;</button>

    <h2></h2>
    <div></div>
</div>

@endsection
