<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LaraFlow — Login</title>
</head>
<body>

<h1>Login</h1>

<form method="POST" action="/login">
    @csrf

    <div>
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}" autocomplete="off">
    </div>

    <div>
        <label>Password</label><br>
        <input type="password" name="password" autocomplete="off">
    </div>

    @if ($errors->any())
        <div style="color: red;">
            {{ $errors->first() }}
        </div>
    @endif

    <button type="submit">Login</button>
</form>

</body>
</html>
