@extends('layout')

@section('body')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{!! $sitetitle or trans('users.titles.profile') !!}</div>

				<div class="panel-body">
					<div class="form-horizontal">
                        <div class="form-group">
							<label class="col-md-4 control-label">{{ trans('auth.username') }}</label>
							<div class="col-md-6">
								<p class="form-control-static">{{ $user->username or '' }}</p>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('users.role') }}</label>
							<div class="col-md-6">
								<p class="form-control-static">{{ $user->roles[0]->role or '' }}</p>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('users.name') }}</label>
							<div class="col-md-6">
								<p class="form-control-static">{{ $user->name or '' }}</p>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('users.email') }}</label>
							<div class="col-md-6">
								<p class="form-control-static">{{ $user->email or '' }}</p>
							</div>
						</div>

						<hr>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('users.birthdate') }}</label>
							<div class="col-md-6">
								<p class="form-control-static">{{ (!empty($user->birthdate) ? Date::parse($user->birthdate)->format('j F Y') : '') }}</p>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('users.sex') }}</label>
							<div class="col-md-6">
								<p class="form-control-static">{{ (!empty($user->sex) ? trans('users.gender.'.$user->sex) : '') }}</p>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('users.phone') }}</label>
							<div class="col-md-6">
								<p class="form-control-static">{{ $user->phone or '' }}</p>
							</div>
						</div>

                        <div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<a class="btn btn-default" href="{{ route('users-list') }}"><i class="fa fa-arrow-left"></i> {{ trans('users.titles.management') }}</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
