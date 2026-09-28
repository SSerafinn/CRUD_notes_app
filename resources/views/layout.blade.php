<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Notes')</title>
</head>
<body>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @yield('content')
</body>
</html>
