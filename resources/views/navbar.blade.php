<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Ecommerce Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                @auth()
                <li class="nav-item">
                    <a class="navbar-brand border border-l-200" href="admin/products/add">Add A Product</a>
                </li>
                @endauth

            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ms-3">
                @auth()
                <li class="nav-item">
                    <span class="text-white mr-2">{{ auth()->user()->name  }}</span>
                        <form action="{{ route('destroy') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-secondary">Logout</button>
                        </form>

                </li>
                @endauth
                @guest()
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
