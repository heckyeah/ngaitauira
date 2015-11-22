<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body id="login">

    <div class="login_container">
        <div class="login_position">
            <form method="POST" action="/auth/login">
                {!! csrf_field() !!}
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div>
                    <input type="checkbox" name="remember"> <label for="remember">Remember Me</label>
                </div>
                <div>
                    <input type="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>