<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="/script.js"></script>
    <title>O-Clean</title>
</head>

<body>
    @include('includes.BankSampahNav')
    <div class="mt-10 pt-5">
        <div class="mt-10">
            @yield('content')
        </div>
    </div>
</body>

</html>

@yield('script')
