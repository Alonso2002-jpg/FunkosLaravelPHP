<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css',
            'resources/js/app.js',
            'resources/css/all.min.css'])
</head>
<body class="bg-gradient-primary">
        <div class="container">
            @yield('content')
        </div>

        @vite(['resources/vendor/jquery/jquery.min.js',
        'resources/vendor/bootstrap/bootstrap.bundle.min.js',
        'resources/vendor/jquery/jquery.easing.min.js',
        'resources/js/sb-admin-2.js'])
</body>
</html>
