<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>
        {{-- Para extender una estructura para el uso en distintas vistas, deberia especificar de la siguiente forma la seccion --}}
        @yield('title')
    </title>
    @yield('resouce')
</head>

<body>
    <main>
        @yield('content')
    </main>
</body>

</html>