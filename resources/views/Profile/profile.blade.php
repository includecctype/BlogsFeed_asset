<x-navbar :pathname="$pathname">
    @vite('resources/CSS/profile.scss')
    
    <div class="Profile">
        <p>Welcome, {{$user->name}}</p>
    </div>
    <div class="Feed">
        @foreach ($posts as $post)
        <div>
            <p>{{$post->post_text}}</p>
            <img src="{{ asset($post->post_file) }}" alt="Post Image"/> 
        </div>
        <hr/>
        @endforeach
    </div>

</x-navbar>