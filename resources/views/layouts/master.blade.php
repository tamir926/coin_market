<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: 100%;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <style type="text/css">
        .logo {
            margin: 50px auto;
            max-width: 500px;
        }
    </style>
</head>
<body style="height:100%; background: linear-gradient(45deg, rgba(0,0,0,1) 0%, rgba(41,44,47,1) 18%, rgba(31,37,42,1) 18%, rgba(58,61,65,1) 62%, rgba(73,78,87,1) 62%, rgba(54,56,59,1) 100%);">
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="logo">
                    <a href="{{ url('/') }}" target="_blank">
                        <img src="/img/logo.png" width="250px;" class="mx-auto d-block img-fluid">
                    </a>
                </div>
            </div>

            @yield('content')
        </main>
    </div>
</body>
</html>
