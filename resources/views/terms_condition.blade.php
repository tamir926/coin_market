<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <style type="text/css">
        .navbar img {
             display:block;
             margin: 0px auto;
        }

        .page-header {
            padding: 20px 0;
            font-weight: 300;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>
    <!-- Image and text -->
    <nav class="navbar navbar-dark" style="background-color:#000;">
        <img src="/img/logo.png" height="45" class="d-inline-block align-top" alt="">
    </nav>

    <div class="container">
        <center><h2 class="page-header">Үйлчилгээний нөхцөл</h2></center>
        <div class="embed-responsive embed-responsive-4by3">
            <object data="/files/terms.pdf" type="application/pdf">
                <p>
                    Your browser does not support embedded PDF files.<br>
                    <a href="test.pdf">Click here to
                    download the PDF file.</a>
                </p>
            </object>
        </div>
    </div>
</body>
</html>
