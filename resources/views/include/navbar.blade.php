<nav class="navbar navbar-expand-lg navbar-custom sticky-top p-2 mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/todolist">Todolist</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">

        <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
        </li>

        {{-- Not Login --}}
        @guest
            <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
            </li>
        @endguest

        {{-- Has Login --}}
        @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.show') }}">
                    Profile
                </a>
            </li>

            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-secondary">
                        Logout
                    </button>
                </form>
            </li>
        @endauth

    </ul>
</div>

    </div>
</nav>
