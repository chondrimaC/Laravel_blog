<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('/') }}">Laravel Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"> <!-- CHANGE ACTIVE CLASS FOR EVERY PAGE -->
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item {{ Request::is('blog') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('blog') }}">Blog</a>
            </li>
            <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('about') }}">About</a>
            </li>
            <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('contact') }}">Contact</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                My Account </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('posts.index') }}">Post</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Log Out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
