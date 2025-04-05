<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogsFeed</title>

    {{-- @vite('resources/CSS/frame.scss') --}}
    <link rel="stylesheet" href="{{ asset('CSS/frame.css') }}"/>
    <link rel="stylesheet" href="{{ asset('CSS/feed.css') }}"/>
    <link rel="stylesheet" href="{{ asset('CSS/login.css') }}"/>
    <link rel="stylesheet" href="{{ asset('CSS/register.css') }}"/>
</head>
<body>

    <div class="Navbar">
        <img alt="Logo" src="{{ asset('SVG/Logo.svg') }}"/>
        <nav>
            @if($pathname == "home")
            <a href="{{route('profile')}}">PROFILE</a>
            @elseif($pathname == "profile")
            <a href="{{route('home')}}">HOME</a>
            @elseif($pathname == "auth")
            <a href="{{route('profile')}}">PROFILE</a>
            <a href="{{route('home')}}">HOME</a>
            @endif
            <a href="{{route('setting')}}">SETTING</a>
            @auth
            <form action="{{route('logout')}}" method="POST">
                @csrf 
                <button type="submit">LOGOUT</button>
            </form>
            @endauth
        </nav>
        <svg version="1.1" viewBox="0 0 26.458 26.458" xmlns="http://www.w3.org/2000/svg">
            <g fill="#dcdcdc">
             <rect x=".22084" y=".22084" width="26.017" height="26.017" rx="1.3746" ry="1.276" fill-opacity=".5"/>
             <g stroke="#000" stroke-linecap="round">
              <path d="m6.1645 13.229h14.129" stroke-width=".52917"/>
              <path d="m6.1645 7.7766h14.129" stroke-width=".52917"/>
              <path d="m6.1645 18.824h14.129" stroke-width=".52917"/>
             </g>
            </g>
        </svg>
    </div>

    {{$slot}}

    @auth
    <img alt="AddPost" src="{{ asset('SVG/AddPost.svg') }}" class="AddPost"/>
    @endauth

    <script>
        const whether_Authenticated = @json(auth()->check());
    </script>

    {{-- @vite('resources/JS/frame.js') --}}
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
    <script src="{{ asset('JS/frame.js') }}" type="module"></script>
    <script src="{{asset('JS/feed.js')}}" type="module"></script>

</body>
</html>