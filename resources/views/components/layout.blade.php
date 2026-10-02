@props(['title' => 'My Notes'])
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="max-w-2xl mx-auto p-6">
        <header class="mb-6">
            <a href="{{ route('notes.index') }}" class="text-xl font-bold text-gray-900">My Notes</a>
        </header>
 
    {{ $slot }}
    </div>
</body>
</html>
