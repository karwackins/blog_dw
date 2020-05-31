<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- MDBootstrap -->
    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
{{--    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
<!-- MDB core JavaScript -->
    <script type="text/javascript" src=" {{ asset('js/mdb.min.js') }}"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript" src="{{ asset('js/dkscript.js') }}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- MDBootstrap -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('https://use.fontawesome.com/releases/v5.11.2/css/all.css')}}">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap')}}">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">

    <!-- End MDBootstrap -->
</head>
<body>
    <div id="app">
        <nav>
            @include('layouts.navbar')
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer>
            @include('layouts.footer')
        </footer>
    </div>
</body>
</html>
