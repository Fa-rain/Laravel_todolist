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
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.show') }}">Profile</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
