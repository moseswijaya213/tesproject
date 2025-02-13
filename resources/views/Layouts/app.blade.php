<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link rel="stylesheet" href="{{ asset('css\styles.css') }}">
</head>

<body>
    <div class="sidebar">
        <div class="sidebarhead">
            <img class="logoimg" src="{{ asset('logocpp.jpg') }}" alt="Logo CP" width="180px" height="90px">
            <div class="welcometxt">
                User {{ Auth::user()->name }}
            </div>
        </div>
        <ul>
            <div>Menu</div>
            <hr>
            <li class="topmenu"><a href="/home">Dashboard</a></li>
            <li><a href="/addproject">Add New Project</a></li>
            <li><a href="/projects">Projects</a></li>
            <li><a href="/register">Regist User</a></li>
        </ul>
    </div>

    <div class="content">
        @yield('content')
    </div>
</body>

</html>