<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    @stack("head")
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                {{env("APP_NAME")}}
            </a>
            <div class="navbar-burger burger" data-target="navMenubd-example">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="navbar-start">
            <a href="{{route("categories_home")}}" class="navbar-item">
                Producten
            </a>
        </div>
        <div class="navbar-end">
            <div class="navbar-item has-dropdown is-hoverable shopping-cart-container">
                <div class="navbar-link">
                    {{Auth::user()->name}}
                </div>
                <div class="navbar-dropdown">
                    <a href="{{route("profile")}}" class="navbar-item">Profile</a>
                    @isAdmin
                    <hr class="navbar-divider">
                    <a href="{{route("admin_home")}}" class="navbar-item">Dashboard</a>
                    @endisAdmin
                </div>
            </div>
        </div>
    </nav>
    <div class="content">
        @yield('content')
    </div>
</div>

<!-- Scripts -->
@stack("footer")
</body>
</html>
