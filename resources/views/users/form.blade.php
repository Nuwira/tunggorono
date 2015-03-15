@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('users.titles.profile') }}</div>

				<div class="panel-body">
					{!! Form::open(['route' => 'user-save', 'class' => 'form-horizontal', 'role' => 'form']) !!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('auth.username') }}</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="username" value="{{ $auth->user()->username or old('username') }}" {{ (!empty($auth->user()->id) ? 'disabled' : 'required') }}>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('users.name') }}</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ $auth->user()->name or old('name') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('users.email') }}</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ $auth->user()->email or old('email') }}" required>
							</div>
						</div>

						<hr>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('users.birthdate') }}</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="birthdate" value="{{ $auth->user()->birthdate or old('birthdate') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('users.sex') }}</label>
							<div class="col-md-6">
								<label class="radio-inline">
								{!! Form::radio('sex', 'M', (!empty($auth->user()->sex) && $auth->user()->sex == 'M' ? 'M' : '')) !!} {{ trans('users.gender.M') }}
								</label>
								<label class="radio-inline">
								{!! Form::radio('sex', 'F', (!empty($auth->user()->sex) && $auth->user()->sex == 'F' ? 'F' : '')) !!} {{ trans('users.gender.F') }}
								</label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('users.phone') }}</label>
							<div class="col-md-6">
								<input type="tel" class="form-control" name="phone" value="{{ $auth->user()->phone or old('phone') }}">
							</div>
						</div>

						<hr>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('auth.password') }}</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('users.password') }}</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password2">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									{{ trans('buttons.save') }}
								</button>

								<!--<a href="/password/email">Forgot Your Password?</a>-->
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
