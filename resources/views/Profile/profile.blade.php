<x-navbar :pathname="$pathname">
    
    <div class="Profile">

    </div>
    <div class="Feed">
        @foreach ($posts as $post)
        <div>
            <p>{{$post->post_text}}</p>
            <img src="{{$post->post_file}}" alt="Post Image"/> <!-- src is returning 0 or false -->
        </div>
        <hr/>
        @endforeach
    </div>

</x-navbar>