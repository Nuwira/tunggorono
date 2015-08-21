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
				@if (empty($auth) || $auth->guest())
					<li><a href="{{ url('auth/login') }}">{{ trans('buttons.login') }}</a></li>
					<!--<li><a href="/auth/register">Register</a></li>-->
				@else
					@if ($auth->user()->can('user-list'))
					<li><a href="{{ route('users-list') }}"><i class="fa fa-user fa-lg"></i></a></li>
					@endif
					@if ($auth->user()->can('role-list'))
					<li><a href="{{ route('roles-list') }}"><i class="fa fa-users fa-lg"></i></a></li>
					@endif
					{{--@if ($auth->user()->can('permission-list'))
					<li><a href="{{ route('permission-list') }}"><i class="fa fa-key fa-lg"></i></a></li>
					@endif--}}
					@if ($auth->user()->can('system-info'))
					<li><a href="{{ route('system-info') }}" title="{{ trans('system.title') }}"><i class="fa fa-info-circle fa-lg"></i></a></li>
					@endif
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ $auth->user()->name }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
    						@if ($auth->user()->can('edit-profile-web'))
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