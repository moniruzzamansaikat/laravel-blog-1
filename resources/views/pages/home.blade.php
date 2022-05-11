@extends('layouts.app') @section('title', 'Home') @section('content')

<!-- main slider -->
<section class="main-slider">
    <div class="hero-img">
        <div class="hero-bg"></div>
        <div class="container">
            <div class="hero-text">
                <div class="welcome-text">
                    <span class="big-text">WELCOME</span
                    ><span class="small-text">TO OUR BLOG</span>
                </div>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
        <a href="#about"
            ><i class="fas fa-chevron-down" aria-hidden="true"></i
        ></a>
    </div>
</section>
<!-- end of main slider -->

<!-- about section -->
<section id="about" class="aboutus">
    <div class="container">
        <div class="row">
            <div class="right col-md-6">
                <div class="text-right">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Deserunt perspiciatis ex ipsam
                    </p>
                </div>
            </div>
            <div class="left col-md-6">
                <div class="text-left">
                    <h2 class="underscore">about us</h2>
                    <p class="sup-header">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Deserunt perspiciatis ex ipsam similique blanditiis.
                        Culpa hic quia, repellendus corrupti
                    </p>
                    <p class="">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Deserunt perspiciatis ex ipsam similique blanditiis.
                        Culpa hic quia, repellendus corrupti perspiciatis
                        praesentium necessitatibus alias illo quidem.
                        Repudiandae expedita illum aspernatur magni? Lorem ipsum
                        dolor sit amet consectetur adipisicing elit. Deserunt
                        perspiciatis ex ipsam similique blanditiis. Culpa hic
                        quia, repellendus corrupti perspiciatis praesentium
                        necessitatibus alias illo quidem. Repudiandae expedita
                        illum aspernatur magni?
                    </p>
                </div>
                <a href="contact.html" class="main-button"
                    >Let’s work together</a
                >
            </div>
        </div>
    </div>
    <div class="black-div"></div>
</section>
<!-- end of about section -->

<!-- new articles -->
<section class="new-articles">
    <div class="card-group">
        <div class="card bg-dark text-white">
            <img
                src="img/architecture-1857175_1920.jpg"
                class="card-img"
                alt="..."
            />
            <div class="card-img-overlay p-3">
                <div class="text-overlay">
                    <p class="card-text text-uppercase">Most Popular</p>
                    <h5 class="card-title text-uppercase">
                        Lorem, ipsum dolor sit amet consectetur
                    </h5>
                    <div class="line"></div>
                    <div class="card-text autor-data d-flex pb-3">
                        <p class="post-autor text-uppercase">
                            Posted by someone&nbsp;
                        </p>
                        <p class="post-data text-uppercase">| 30 07 2021</p>
                    </div>
                    <a href="" class="card-button">Read article</a>
                </div>
            </div>
        </div>
        <div class="card bg-dark text-white">
            <img src="img/castle-1998435_1920.jpg" class="card-img" alt="..." />
            <div class="card-img-overlay p-3">
                <div class="text-overlay">
                    <p class="card-text text-uppercase">Most Popular</p>
                    <h5 class="card-title text-uppercase">
                        Lorem, ipsum dolor sit amet consectetur
                    </h5>
                    <div class="line"></div>
                    <div class="card-text autor-data d-flex pb-3">
                        <p class="post-autor text-uppercase">
                            Posted by someone&nbsp;
                        </p>
                        <p class="post-data text-uppercase">| 30 07 2021</p>
                    </div>
                    <a href="" class="card-button">Read article</a>
                </div>
            </div>
        </div>
        <div class="card bg-dark text-white">
            <img
                src="img/staircase-274614_1920.jpg"
                class="card-img"
                alt="..."
            />
            <div class="card-img-overlay p-3">
                <div class="text-overlay">
                    <p class="card-text text-uppercase">Most Popular</p>
                    <h5 class="card-title text-uppercase">
                        Lorem, ipsum dolor sit amet consectetur
                    </h5>
                    <div class="line"></div>
                    <div class="card-text autor-data d-flex pb-3">
                        <p class="post-autor text-uppercase">
                            Posted by someone&nbsp;
                        </p>
                        <p class="post-data text-uppercase">| 30 07 2021</p>
                    </div>
                    <a href="" class="card-button">Read article</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of new articles -->

<!-- recent posts -->
<section id="posts" class="recent-posts">
    <div class="container">
        <h2 class="underscore">RECENT POSTS</h2>
        <p class="sup-header">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt
            perspiciatis ex ipsam similique blanditiis. Culpa hic quia,
            repellendus corrupti
        </p>
        <div class="posts-wrapper">
            @foreach($posts as $post)
            <div class="post-item">
                <div class="post-meta">
                    <span
                        ><i class="far fa-user" aria-hidden="true"></i> Posted
                        by {{$post->author->name}}</span
                    ><span
                        ><i class="far fa-calendar" aria-hidden="true"></i
                        >{{$post->created_at->diffForHumans()}}</span
                    >
                </div>
                <a
                    href="{{ route('blog.show', $post) }}"
                    class="post-title"
                    >{{$post -> title}}</a
                >
                <div class="post-meta">
                    <span
                        ><i class="far fa-comment-alt" aria-hidden="true"></i>
                        {{$post->comments->count()}}
                        {{Str::plural('comment', $post->comments->count())}}</span
                    >
                </div>
            </div>
            @endforeach
            <a href="blog.html" class="main-button">View all posts</a>
        </div>
    </div>
</section>
<!-- end of recent posts -->

<!-- newsletter -->
<section id="subscribe" class="subscribe">
    <div class="container">
        <h2>Subscribe &amp; Don’t Miss Out</h2>
        <p class="">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt
            perspiciatis ex ipsam similique blanditiis. Culpa hic quia,
            repellendus corrupti perspiciatis praesentium
        </p>
        <form action="{{ route('newsletter.store') }}" method="post">
            @csrf <input type="email" class="email text-uppercase"
            id="exampleInputEmail1 aria-describedby=" name="email" emailhelp"=""
            placeholder="Enter your email" /> @error('email')
            <div class="invalid-feedback" data-sb-feedback="message:required">
                {{ $message }}
            </div>
            @enderror

            <button type="submit" class="button-subscribe text-uppercase">
                subscribe
            </button>
        </form>
    </div>
</section>
<!-- end of news letter -->

@endsection
