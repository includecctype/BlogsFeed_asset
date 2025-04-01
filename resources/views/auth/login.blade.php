<x-navbar :pathname="$pathname">
    <form action="" method="POST" class="Login">
        @csrf

        <label for="email">Email: </label>
        <input type="email" name="email" required autofocus/>
        <label for="password">Password: </label>
        <input type="password" name="password" required/>

        <button type="submit">SUBMIT</button>

        @if($errors->any())
            @foreach($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
        @endif
    </form>

    <a href="{{route('register')}}">do not have an account yet?</a>

    @vite('resources/CSS/login.scss')
</x-navbar>