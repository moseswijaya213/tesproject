<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\styles.css') }}">
</head>

<body class="loginregister">
    <div class="loginform p-4">
        <form class="formm" action="{{ url('register') }}" method="post">
            @csrf
            <img class="logoimg mb-4" src="Logocp.png" alt="" width="150px" height="50px">
            <input class="form-control mb-3" type="text" id="name" name="name" placeholder="Name" required>
            <input class="form-control mb-3" type="text" id="email" name="email" placeholder="Email" required>
            <input class="form-control mb-3" type="password" id="password" name="password" placeholder="Password" required>
            <select class="form-select mb-3" name="role" id="" required>
                <option selected="true" disabled>Role</option>
                <option value="Admin">Admin</option>
                <option value="Manajer">Manajer</option>
                <option value="Staff">Staff</option>
            </select>
            <select class="form-select mb-3" name="division" id="" required>
                <option selected="true" disabled>Divisi</option>
                <option value="IT">IT</option>
                <option value="Infrastructure">Infrastructure</option>
                <option value="Design">Design</option>
            </select>
            @if($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        {{$error}}
                    @endforeach
                </div>
            @endif
            <div class="p-3">
                <button class="submitbutton btn" type="submit">Register</button>
            </div>
        </form>
    </div>

</body>

</html>