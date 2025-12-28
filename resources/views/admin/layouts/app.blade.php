<!-- resources/views/admin/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>© 2025 My App</p>
    </footer>
</body>
</html>
