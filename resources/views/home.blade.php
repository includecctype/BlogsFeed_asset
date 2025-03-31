<x-navbar :pathname="$pathname">
    @vite('resources/CSS/feed.scss')
    
    <div class="Feed">
        @foreach($posts as $post)
        <div>
            <p>{{$post->post_text}}</p>
            <img src="{{$post->post_file}}" alt="Post Image"/> <!-- src is returning 0 or false -->
        </div>
        <hr/> <!-- Not Working -->
        @endforeach
    </div>

    <form method="" action="POST" class="PostForm">
        <label for="post_text">Thoughts: </label>
        <input type="text" name="post_text" required/>
        <label for="post_file">File: </label>
        <input type="file" name="post_file"/>

        <input type="image" src=""/>
    </form>

    @vite('resources/JS/frame.js') <!-- Use another JS file, create new querySelector for the elements -->
</x-navbar>