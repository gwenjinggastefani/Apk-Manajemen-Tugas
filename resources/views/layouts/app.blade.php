<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="{{ route('projects.index') }}" class="navbar-brand">Task Manager</a>
    </div>
</nav>
<div class="container mt-4">
    @yield('content')
</div>
</body>
</html>
