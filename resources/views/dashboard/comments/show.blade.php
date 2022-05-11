@extends("layouts.admin") @section('title', 'Comment' ) @section('content')

<h2 class="mb-0">Commented by {{$comment -> name}}</h2>
<small
    class="d-inline-block mb-3"
    >{{$comment -> created_at -> diffForHumans()}}</small
>

<div class="card">
    <div class="card-body">
        <a href="" class="btn btn-primary mb-3">Go back</a>

        <h4>Email: {{$comment -> email}}</h4>

        <p class="mb-0">Comment Body:</p>
        <p style="font-size: 1.2rem">{{$comment -> body}}</p>
    </div>
</div>

@endsection
































