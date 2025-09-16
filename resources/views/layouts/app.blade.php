<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Project Manager')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    {{-- Header / Navbar --}}
    @if (!request()->is('login'))
        @include('partials.header')
    @endif

    <main class="container mt-4">
        {{-- Content dari tiap halaman --}}
        @yield('content')
    </main>

    {{-- Footer / F --}}
    @if (!request()->is('login'))
        @include('partials.footer')
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>