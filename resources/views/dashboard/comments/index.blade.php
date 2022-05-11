@extends("layouts.admin") @section('title', 'Comments') @section('content')
<h2>Comments</h2>

@if($comments -> count() > 0)
<div class="card card-body">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>
                        <a
                            href="{{
                                route('dashboard.comments.show', $comment)
                            }}"
                            >#{{$comment->id}}</a
                        >
                    </td>
                    <td>{{$comment -> name}}</td>
                    <td>{{$comment -> email}}</td>
                    <td>
                        <form
                            action="{{
                                route('dashboard.comments.destory', $comment)
                            }}"
                            method="post"
                        >
                            @csrf @method('DELETE')
                            <input
                                type="submit"
                                value="delete"
                                class="btn btn-danger btn-sm"
                            />
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
<h2>No comments to show!</h2>
@endif @endsection
