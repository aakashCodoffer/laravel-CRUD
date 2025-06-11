<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="">
    <nav class="nav justify-content-between px-4 bg-primary-subtle py-2">
        @if(Auth::user())
            <p class="text-lg">{{ Auth::user()->name }}</h1>
        @else
            <p class="text-2xl">Vehicle-Info</>
        @endif
        @if(Auth::check())
            <form action="{{ route("logout") }}" method="POST">
                @csrf
                @method('POST')
                    <button class="btn btn-danger" type="submit">Logout</button>
            </form>
            @else
                <div>
                    <a href="{{ route("login.user")}}" class="btn btn-info" type="submit">Login</a>
                    <a href="{{ route("register.user") }}" class="btn btn-success" type="submit">Register</a>
                </div>
        @endif
        
    </nav>
    
    <div class="flex flex-col items-center justify-center h-full w-full">
        <h1>@yield('title')</h1>
        @yield('content')
    </div>
</body>
</html>
