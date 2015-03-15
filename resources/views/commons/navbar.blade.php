<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">{{ trans('buttons.togglenav') }}</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ url('/') }}">{{ config('site.name') }}</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				@if ($auth->guest())
					<li><a href="{{ url('auth/login') }}">{{ trans('buttons.login') }}</a></li>
					<!--<li><a href="/auth/register">Register</a></li>-->
				@else
					@if (Auth::user()->can('system-info'))
					<li class="dropdown">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-cog fa-lg"></i></a>
					    <ul class="dropdown-menu" role="menu">
    					    <li><a href="{{ route('system-info') }}">{{ trans('system.title') }}</a></li>
					    </ul>
					</li>
					@endif
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
    						@if (Auth::user()->can('edit-profile-web'))
    						<li><a href="{{ route('user-profile') }}">{{ trans('users.titles.profile') }}</a></li>
    						<li class="divider"></li>
    						@endif
							<li><a href="{{ url('auth/logout') }}">{{ trans('buttons.logout') }}</a></li>
						</ul>
					</li>
				@endif
			</ul>
		</div>
	</div>
</nav>