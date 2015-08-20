<!DOCTYPE html>
<html class="no-js" lang="{{ config('app.locale') }}">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>{{ $sitetitle or config('site.name') }}</title>
<link rel="stylesheet" href="{{ elixir('css/app.css') }}">
@section('style')
@show
</head>
<body>
@include('commons.navbar')
@include('commons.notif')
@yield('body')
<script src="{{ elixir('js/app.js') }}"></script>
@section('script')
@show
</body>
</html>
