<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Katalog Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Katalog Buku</a>
        <ul class="navbar-nav ms-auto">
            @auth
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                    </li>
                @endif

                @if(auth()->user()->role === 'admin')
                    <li class="nav-item"><a href="{{ route('books.index') }}" class="nav-link">Buku</a></li>
                    <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link">Kategori</a></li>
                @endif

                <li class="nav-item">
                    <span class="nav-link disabled text-light">
                        👤 {{ auth()->user()->name }}
                    </span>
                </li>

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">@csrf
                        <button class="btn btn-link nav-link" type="submit">Logout</button>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @yield('content')
</div>

</body>
</html>
