<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css\styles.css') }}">
</head>

<body class="loginregister">
    <div class="loginform">
        <form class="formm" action="{{ url('register') }}" method="post">
            @csrf
            <img class="logoimg" src="Logocp.png" alt="" width="150px" height="50px">
            <div class="input-block">
                <input class="inputloginregister" type="text" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="input-block">
                <input class="inputloginregister" type="text" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-block">
                <input class="inputloginregister" type="password" id="password" name="password" placeholder="Password"
                    required>
            </div>
            <div class="input-block">
                <select class="inputloginregister" name="role" id="" required>
                    <option selected="true" disabled>Role</option>
                    <option value="Admin">Admin</option>
                    <option value="Manajer">Manajer</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>
            <div class="input-block">
                <select class="inputloginregister" name="division" id="" required>
                    <option selected="true" disabled>Divisi</option>
                    <option value="IT">IT</option>
                    <option value="Infrastructure">Infrastructure</option>
                    <option value="Design">Design</option>
                </select>
            </div>
            @if($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        {{$error}}
                    @endforeach
                </div>
            @endif
            <button class="submitbutton" type="submit">Register</button>
        </form>
    </div>

</body>

</html>