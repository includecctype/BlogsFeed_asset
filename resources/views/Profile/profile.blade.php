<x-navbar :pathname="$pathname">
    @vite('resources/CSS/profile.scss')
    
    <div class="Profile">
        <p>Welcome, {{$user->name}}</p>
    </div>
    <div class="Feed">
        @for ($i = 0; $i < count($posts); $i++)
        <div>
            <p>{{$posts[$i]->post_text}}</p>
            <img src="{{ $images[$i] }}" alt="Post Image"/> 
        </div>
        <hr/>
        @endfor
    </div>

</x-navbar>