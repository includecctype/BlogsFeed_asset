<x-navbar :pathname="$pathname">
    <form action="" method="POST" class="Register">
        @csrf

        <label for="name">Name: </label>
        <input type="text" name="name" required autofocus/>
        <label for="email">Email: </label>
        <input type="email" name="email" required/>
        <label for="password">Password: </label>
        <input type="password" name="password" required/>
        <label for="password_confirmation">Confirm Password: </label>
        <input type="password" name="password_confirmation" required/>

        <button type="submit">SUBMIT</button>

        @if($errors->any())
            @foreach($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
        @endif
    </form>
</x-navbar>