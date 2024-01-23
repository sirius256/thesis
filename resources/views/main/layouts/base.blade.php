<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('/css/fontawesome-free-6.5.1-web/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/fontawesome-free-6.5.1-web/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/fontawesome-free-6.5.1-web/css/solid.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('main.components.sessionMessages')
    @yield('pageContent')
</body>
</html>
