<x-navbar :pathname="$pathname">
    @vite('resources/CSS/feed.scss')
    
    <div class="Feed">

    </div>

    <form method="" action="POST" class="PostForm">
        <label for="post_text">Thoughts: </label>
        <input type="text" name="post_text" required/>
        <label for="post_file">File: </label>
        <input type="file" name="post_file"/>

        <input type="image" src=""/>
    </form>


</x-navbar>