<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required />
            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required />
            @error('password')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="remember_me">Remember me</label>
            <input id="remember_me" type="checkbox" name="remember_me" />
        </div>
        <div>
            <a href="">Forgot your password?</a>
        </div>
        <div>
            <button>Login</button>
        </div>
    </form>
</body>

</html>
