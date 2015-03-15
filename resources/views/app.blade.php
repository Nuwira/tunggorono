<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ (!empty($sitetitle) ? $sitetitle .' &mdash; ' : '') . config('site.name') }}</title>

	{!! HTML::style('css/app.css') !!}
	{!! HTML::style('assets/font-awesome/css/font-awesome.min.css') !!}

	<!-- Fonts -->
	{!! HTML::style('fonts.googleapis.com/css?family=Roboto:400,300') !!}

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		{!! HTML::style('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') !!}
		{!! HTML::style('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') !!}
	<![endif]-->
</head>
<body>
	@include('commons.navbar')

	@include('commons.notif')

	@yield('content')

	<!-- Scripts -->
	{!! HTML::script('assets/jquery/jquery.min.js') !!}
	{!! HTML::script('assets/bootstrap/js/bootstrap.min.js') !!}
</body>
</html>
