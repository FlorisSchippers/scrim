<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Scrim.io</title>

    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    {{--<link href="/css/app.css" rel="stylesheet">--}}

    @yield('header')
</head>
<body>

@yield('content')

@yield('footer')

</body>
</html>