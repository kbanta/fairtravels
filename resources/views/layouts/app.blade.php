<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <!-- In the head section of your view file -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('temp/img/core-img/ft_logo.png')}}">
    <!-- Core Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('temp/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet"> -->
    <link href="{{asset('temp/css/others/animate.css')}}" rel="stylesheet">
    <link href="{{asset('temp/css/others/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('temp/css/others/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('temp/css/others/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('temp/css/others/pe-icon-7-stroke.css')}}" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="{{asset('temp/css/responsive/responsive.css')}}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <main class="">
            @yield('content')
        </main>
    </div>
    <!-- ****** Footer Area End ****** -->

    <!-- jQuery-2.2.4 js -->
    <script src="{{asset('temp/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('temp/js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap-4 js -->
    <script src="{{asset('temp/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{asset('temp/js/others/plugins.js')}}"></script>
    <!-- Active JS -->
    <script src="{{asset('temp/js/active.js')}}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</body>

</html>