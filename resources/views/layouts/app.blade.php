<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <!-- Styles -->
    <link href="{{ asset(mix('assets/css/app.css')) }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        @auth
            @include('layouts.navbar')
        @endauth
    
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset(mix('assets/js/app.js')) }}"></script>
</body>
</html>
