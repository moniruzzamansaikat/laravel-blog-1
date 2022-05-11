@extends('layouts.app') @section('content')
<div class="container">
    <div class="row mainmargin">
        <div class="single-post col-md-8">
            <h2 class="underscore">{{$post->title}}</h2>
            <div class="post-meta">
                <span
                    ><i class="far fa-user" aria-hidden="true"></i> Posted by
                    {{$post->author->name}}</span
                ><span
                    ><i class="far fa-calendar" aria-hidden="true"></i>
                    {{$post->created_at -> diffForHumans()}}</span
                ><span
                    ><i class="far fa-comment-alt" aria-hidden="true"></i>
                    {{$post->comments->count()}}
                    {{Str::plural('comment', $post->comments->count())}}</span
                >
            </div>
            <img src="{{$post->image ? asset('images/' .  $post->image ) : asset('images/default_image.png')}}" alt="">
            {!! $post->body !!} 

            <figure class="quote text-end">
                <blockquote class="blockquote">
                    <p>
                        A well-known quote, contained in a blockquote element.
                    </p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    Someone famous in
                    <cite title="Source Title">Source Title</cite>
                </figcaption>
            </figure>

            <!-- share  -->
            <div class="share">
                <a class="main-button" href=""
                    ><i class="fab fa-facebook-f" aria-hidden="true"></i>
                    FACEBOOK</a
                >
                <a class="main-button" href="">
                    <i class="fab fa-google-plus-g" aria-hidden="true"></i>
                    GOOGLE+</a
                >
                <a class="main-button" href=""
                    ><i class="fab fa-twitter" aria-hidden="true"></i>
                    TWITTER</a
                >
                <a class="main-button" href=""
                    ><i class="fab fa-linkedin-in" aria-hidden="true"></i>
                    LINKEDIN</a
                >
                <a class="main-button" href=""
                    ><i class="fab fa-pinterest-p" aria-hidden="true"></i>
                    PINTEREST</a
                >
            </div>
            <!-- end share -->

            <!-- navigation -->
            <div class="navigation">
                <a href="{{route('blog.show', $post->id - 1)}}" class="prew"><class="fa-chevron-left" aria-hidden="true"></class=>PREVIOUS</a>
                <a href="{{route('blog.show', $post->id + 1)}}" class="next">NEXT <i class="fas fa-chevron-right" aria-hidden="true"></i></a>
            </div>
            <!-- end of navigation -->

            <div class="line"></div>

            <!-- comment form -->
            <form
                id="commentForm"
                method="post"
                action="{{ route('blog.comments.store', $post) }}"
            >
                @csrf
                <!-- Message input -->
                <div class="mb-3">
                    <label class="form-label" for="comment"
                        >Leave a Comment</label
                    >
                    <textarea
                        class="form-control"
                        id="comment"
                        name="body"
                        type="text"
                        placeholder=""
                        style="height: 10rem"
                        data-sb-validations="required"
                    >
                    {{ old("body") }}</textarea
                    >

                    @error('body')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <!-- Name input -->
                <div class="mb-3">
                    <input
                        class="form-control"
                        id="name"
                        type="text"
                        placeholder="Name *"
                        data-sb-validations="required"
                        value="{{ old('name') }}"
                        name="name"
                    />

                    @error('name')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <!-- Email address input -->
                <div class="mb-3">
                    <input
                        class="form-control"
                        id="emailAddress"
                        type="email*"
                        placeholder="Email Address *"
                        data-sb-validations="required, email"
                        name="email"
                        value="{{ old('email') }}"
                    />

                    @error('email')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Form submissions success message -->
                @if(session()->has('success'))
                <div class="text-success" id="submitSuccessMessage">
                    <div class="text-center mb-3">
                        {{session()->get('success')}}
                    </div>
                </div>
                @endif

                <!-- Form submit button -->
                <div class="d-grid">
                    <button class="main-button" id="submitButton" type="submit">
                        Post Comment
                    </button>
                </div>
            </form>
            <!-- end of comment form -->
        </div>
    </div>
</div>
@endsection
