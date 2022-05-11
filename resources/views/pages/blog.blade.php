@extends('layouts.app') @section('content')
<div class="container">
    <div class="row mainmargin">
        <div class="blog col-md-8">
            <!-- all posts -->
            <div class="all-posts">
                @foreach($posts as $post)
                <div class="post-item">
                    <div class="post-img">
                        <img
                            src="{{$post->image ? asset('images/' .  $post->image ) : asset('images/default_image.png')}}"
                            alt=""
                        />
                    </div>
                    <div class="post-main-info">
                        <p class="post-title">{{$post->title}}</p>
                        <div class="post-meta">
                            <span
                                ><i class="far fa-user" aria-hidden="true"></i>
                                Posted by {{$post->author->name}}</span
                            ><span
                                ><i
                                    class="far fa-calendar"
                                    aria-hidden="true"
                                ></i>
                                {{$post->created_at-> format('d M Y') }}</span
                            ><span
                                ><i
                                    class="far fa-comment-alt"
                                    aria-hidden="true"
                                ></i>
                                {{$post->comments->count()}}
                                {{Str::plural('comment',$post->comments->count())}}</span
                            >
                        </div>
                        <p>{{Str::limit($post->body, 220)}}</p>
                        <a
                            href="{{ route('blog.show', $post) }}"
                            class="main-button"
                            >Read More</a
                        >
                    </div>
                </div>
                @endforeach
            </div>
            <!-- end of all post -->

            <!-- pagination -->
            <!-- TODO: navigation -->
            <!-- end of pagination -->
        </div>

        <!-- sidebar -->
        <div class="sidebar col-md-4">
            <!-- recent posts -->
            <div class="recent-posts pt-5">
                <h4 class="mb-3">RECENT POSTS</h4>
                @foreach($recentPosts as $post)
                <div class="post-item">
                    <a
                        href="{{ route('blog.show', $post) }}"
                        class="post-title"
                        >{{$post->title}}</a
                    >
                    <div class="post-meta">
                        <span
                            ><i class="far fa-user" aria-hidden="true"></i>
                            Posted by {{$post->author->name}}</span
                        ><span
                            ><i class="far fa-calendar" aria-hidden="true"></i>
                            {{$post->created_at -> format('m d Y') }}
                        </span>
                        <span
                            ><i
                                class="far fa-comment-alt"
                                aria-hidden="true"
                            ></i>
                            {{$post->comments->count()}}
                            {{Str::plural('comment',$post->comments->count())}}</span
                        >
                    </div>
                </div>
                @endforeach
                <a href="{{ route('blog') }}" class="main-button"
                    >View all posts</a
                >
            </div>
            <!-- end of recent posts -->

            <!-- popular posts -->
            <div class="popular pt-5">
                <h4 class="mb-3">READ MOST POPULAR ARTICLES</h4>
                @foreach($popularPosts as $post)
                <div class="card bg-dark text-white">
                    <img
                        src="{{$post->image ? asset('images/' .  $post->image ) : asset('images/default_image.png')}}"
                        class="card-img"
                        alt="..."
                    />

                    <div class="card-img-overlay p-3">
                        <div class="text-overlay">
                            <h5 class="card-title text-uppercase">
                                {{$post->title}}
                            </h5>
                            <div class="line"></div>
                            <div class="card-text article-meta">
                                <span
                                    ><i
                                        class="far fa-user"
                                        aria-hidden="true"
                                    ></i>
                                    Posted by {{$post->author->name}} </span
                                ><span
                                    ><i
                                        class="far fa-calendar"
                                        aria-hidden="true"
                                    ></i>
                                    30 07 2021</span
                                ><span
                                    ><i
                                        class="far fa-comment-alt"
                                        aria-hidden="true"
                                    ></i>
                                    {{$post->comments->count()}} comments</span
                                >
                            </div>
                            <a
                                href="{{ route('blog.show', $post) }}"
                                class="card-button"
                                >Read article</a
                            >
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- end of popular posts -->

            <!-- end of sidebar -->
        </div>
    </div>
    @endsection
</div>
