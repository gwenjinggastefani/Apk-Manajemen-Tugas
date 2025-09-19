<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Project Manager')</title>
    
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    {{-- Header / Navbar --}}
    @if (!request()->is('login'))
        @include('partials.header')
    @endif

    {{-- Main Content --}}
    <main class="flex-grow container mx-auto px-4 py-8">
        @yield('content')
    </main>

    {{-- Footer --}}
    @if (!request()->is('login'))
        @include('partials.footer')
    @endif

</body>
</html>
