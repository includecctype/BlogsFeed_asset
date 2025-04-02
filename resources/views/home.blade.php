<x-navbar :pathname="$pathname">
    @vite('resources/CSS/feed.scss')
    
    <div class="Feed">
        @foreach($posts as $post)
        <div>
            <p>{{$post->post_text}}</p>
            <img src="{{$post->post_file}}" alt="Post Image"/> <!-- src is returning 0 or false -->
        </div>
        <hr/>
        @endforeach
    </div>

    @auth
    <form method="POST" action="{{route('post')}}" class="PostForm">
        @csrf 

        <label for="post_text">Thoughts: </label>
        <input type="text" name="post_text" required/>
        <label for="post_file">File: </label>
        <input type="file" name="post_file"/>

        <button type="submit">SUBMIT</button>
    </form>
    @endauth

    @vite('resources/JS/feed.js')
</x-navbar>