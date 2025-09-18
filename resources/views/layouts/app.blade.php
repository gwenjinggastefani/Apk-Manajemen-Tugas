<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Project Manager')</title>
    
    <!-- Ganti Bootstrap dengan Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Atau install via npm dan compile -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body class="bg-gray-50 min-h-screen">
    
    {{-- Header / Navbar --}}
    @if (!request()->is('login'))
        @include('partials.header')
    @endif

    <main class="container mx-auto px-4 py-8">
        {{-- Content dari tiap halaman --}}
        @yield('content')
    </main>

    {{-- Footer --}}
    @if (!request()->is('login'))
        @include('partials.footer')
    @endif

    {{-- JS untuk Tailwind (tidak perlu seperti Bootstrap) --}}
</body>
</html>