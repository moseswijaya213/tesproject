<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css\styles.css') }}">
</head>

<body class="loginregister">
    <div class="loginform">
        <form class="form" action="{{ url('login') }}" method="post">
            @csrf
            <img class="logoimg" src="Logocp.png" alt="" width="150px" height="50px">
            <div class="input-block">
                <input class="inputloginregister" type="text" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-block">
                <input class="inputloginregister" type="password" id="password" name="password" placeholder="Password" required>
            </div>

            @if($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        {{$error}}
                    @endforeach
                </div>
            @endif

            <button class="submitbutton" type="submit">Login</button>
        </form>
    </div>

</body>

</html>