<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogsFeed</title>

    @vite('resources/CSS/frame.scss')
</head>
<body>

    <div class="Navbar">
        <img alt="Logo"/>
        <nav>
            @if($pathname == "home")
            <a href="{{route('profile')}}">PROFILE</a>
            @elseif($pathname == "profile")
            <a href="{{route('home')}}">HOME</a>
            @endif
            <a href="{{route('setting')}}">SETTING</a>
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

    

    @vite('resources/js/frame.js')
</body>
</html>