<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex flex-col items-center justify-center min-h-screen w-full">
        <h1>@yield('title')</h1>
        @yield('content')
    </div>
</body>
</html>
