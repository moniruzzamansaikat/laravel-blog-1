<header id="home">
            <nav
                id="#navbar"
                class="navbar dark dark navbar-expand-lg position-fixed top-0 w-100 py-2"
            >
                <div class="container">
                    <a class="navbar-brand" href="{{route("home")}}"
                        ><img src="{{asset('img/logo-blog.png')}}" alt=""
                    /></a>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup"
                        aria-controls="navbarNavAltMarkup"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <i class="fas fa-bars" aria-hidden="true"></i>
                    </button>
                    <div
                        class="collapse navbar-collapse"
                        id="navbarNavAltMarkup"
                    >
                        <div class="navbar-nav ms-auto">
                            <a class="{{Request::is('home') ? 'nav-link active':'nav-link'}}" href="{{route("home")}}">home</a>
                            <a @class([
                                'nav-link',
                                'active' => request()->is('about'),
                            ]) href="{{route("about")}}"
                                >
                                about
                                </a
                            >
                            <a class="nav-link" href="{{route("contact.create")}}">contact</a>
                            <a class="nav-link" href="{{route("blog")}}">Blog</a>
                            @guest
                            <a class="main-button c-button login-button" href="{{route('auth.login.form')}}">Login</a>
                            <a class="main-button c-button login-button" href="{{route('auth.register.form')}}">register</a>
                            @endguest
                            @auth
                            <a class="main-button c-button login-button" href="{{route('dashboard.index')}}">dashboard</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>
        </header>