<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bangun Ruang')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('bangunruang.index') }}">Bangun Ruang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="{{ route('bangunruang.kubus') }}" class="nav-link">Kubus</a></li>
                    <li class="nav-item"><a href="{{ route('bangunruang.balok') }}" class="nav-link">Balok</a></li>
                    <li class="nav-item"><a href="{{ route('bangunruang.limas') }}" class="nav-link">Limas</a></li>
                    <li class="nav-item"><a href="{{ route('bangunruang.tabung') }}" class="nav-link">Tabung</a></li>
                    <li class="nav-item"><a href="{{ route('bangunruang.bola') }}" class="nav-link">Bola</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <main class="container">
        @yield('content')
    </main>

    <footer class="bg-dark text-white text-center py-3 mt-4">
        &copy; {{ date('Y') }} Bangun Ruang | Laravel Project
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
