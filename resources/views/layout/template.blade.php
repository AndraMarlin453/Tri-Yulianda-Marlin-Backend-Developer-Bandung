<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Mahasiswa</title>
        <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/bootstrap.min.css">
    </head>
    <body style="background-color: #d1d0d0">
        <main class="container">
            @include('komponen.message')
            @yield('content')
        </main>
        <script type="text/javascript" src="{{asset('assets')}}/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{asset('assets')}}/js/Jquery.js"></script>
    </body>
</html>