<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ url(mix('assets/css/app.css')) }}">
    </head>
    <body>
        <div class="container">
        @auth()
        
        @else
        
        @endauth
        </div>
        
        
        <!--
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{ config('app.name') }}
                </div>

                <div class="links">
                    <a href="https://nuwira.co.id">Nuwira</a>
                    <a href="https://github.com/nuwira/tunggorono">GitHub</a>
                </div>
            </div>
        </div>
        -->
        <script type="text/javascript" src="{{ url(mix('assets/js/app.js')) }}"></script>
    </body>
</html>
