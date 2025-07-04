<x-navbar :pathname="$pathname">    
    <div class="Profile">
        <p>Welcome, {{$user->name}}</p>
    </div>
    <div class="Feed">
        @for ($i = 0; $i < count($posts); $i++)
        <div>
            <p>{{$posts[$i]->username}}</p>
            <p>{{$posts[$i]->post_text}}</p>
            <img src="{{ $images[$i] }}" alt="Post Image"/> 
        </div>
        <hr/>
        @endfor
    </div>

    <form method="POST" action="{{route('post')}}" enctype="multipart/form-data" class="PostForm">
        @csrf 

        <label for="post_text">Thoughts: </label>
        <input type="text" name="post_text" required/>
        <label for="post_file">File: </label>
        <input type="file" name="post_file"/>

        <button type="submit">SUBMIT</button>
    </form>

</x-navbar>