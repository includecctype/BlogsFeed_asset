<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogsFeed</title>

    {{-- <link rel="stylesheet" href="{{asset('CSS/navbar.scss')}}"/> --}}
</head>
<body>

    <nav class="Navbar">
        @if($pathname == "home")
        <a href="{{route('profile')}}">PROFILE</a>
        @elseif($pathname == "profile")
        <a href="{{route('home')}}">HOME</a>
        @endif
    </nav>



    {{-- <script src="{{asset('JS/navbar.js')}}" type="module"></script> --}}
</body>
</html>