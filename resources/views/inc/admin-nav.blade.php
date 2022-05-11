<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard.index') }}"
            >Admin Panel</a
        >
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="ms-auto navbar-nav">
                <li class="nav-item">
                    <a
                        class="nav-link active"
                        aria-current="page"
                        href="{{ route('dashboard.index') }}"
                        >Home</a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.posts') }}"
                        >Posts</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ route('dashboard.posts.create') }}"
                        >Add Post</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ route('dashboard.categories.index') }}"
                        >Categories</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ route('dashboard.comments.index') }}"
                        >Comments</a
                    >
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdownMenuLink"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Profile
                    </a>
                    <ul
                        class="dropdown-menu"
                        aria-labelledby="navbarDropdownMenuLink"
                    >
                        <li>
                            <a
                                class="dropdown-item"
                                href="{{ route('dashboard.profile') }}"
                                >Profile</a
                            >
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                target="_blank"
                                href="{{ route('home') }}"
                                >Website</a
                            >
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="{{ route('auth.logout') }}"
                                >Logout</a
                            >
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
