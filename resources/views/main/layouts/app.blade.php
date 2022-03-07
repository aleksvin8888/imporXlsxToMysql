<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">


</head>
<body>
    @include('main.includes.topNavbar')


         @include('main.includes.success')
         @yield('mainContent')

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
