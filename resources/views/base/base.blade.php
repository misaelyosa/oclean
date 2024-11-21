<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>O-Clean</title>
</head>
<body>
   
    @yield('content')
</body>
</html>

@yield('script')