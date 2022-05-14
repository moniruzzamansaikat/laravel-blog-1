@extends('layouts.admin') @section('title', 'Dashboard') @section('content')

<h1>Hi, {{auth()->user()->name}}</h1>

<div class="row mt-3">
    <div class="col-md-6">
        <div class="card card-body">
            <h3>You have total {{ $totalPosts }} {{Str::plural('post', $totalPosts)}}</h3>
            <p><a href="{{ route('dashboard.posts') }}">Manage posts</a></p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-body">
            <h3>You have total {{ $totalComments }} comments</h3>
            <p><a href="">Manage comments</a></p>
        </div>
    </div>
</div>

@endsection
