<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<div class ="sidebar-menu">
    <p>
    <a href="{{route('driverr.index')}}">Водители
    </a></p>
    <p>
    <a href="{{route('transportt.index')}}">Автомобили</a></p>
    <p>
        <a href="{{url('/dashboard')}}">SleepingOwl админка и круды</a></p>
</div>
<div class="container">
    @yield('content')
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>