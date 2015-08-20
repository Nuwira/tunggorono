@extends('layout')

@section('body')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{!! $sitetitle or trans('users.titles.profile') !!}</div>

				<div class="panel-body">
					{!! Form::open(['route' => 'user-update', 'class' => 'form-horizontal', 'role' => 'form', 'files' => true]) !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{ $user->id }}">

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('auth.username') }}</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="username" value="{{ $user->username or old('username') }}" {{ (!empty($user->id) ? 'disabled' : 'required') }}>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('users.role') }}</label>
							<div class="col-md-6">
								<p class="form-control-static">{{ $user->roles[0]->role }}</p>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('users.name') }}</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ $user->name or old('name') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('users.email') }}</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ $user->email or old('email') }}" required>
							</div>
						</div>

						<hr>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('users.birthdate') }}</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="birthdate" value="{{ $user->birthdate or old('birthdate') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('users.sex') }}</label>
							<div class="col-md-6">
								<label class="radio-inline">
								{!! Form::radio('sex', 'M', (!empty($user->sex) && $user->sex == 'M' ? 'M' : '')) !!} {{ trans('users.gender.M') }}
								</label>
								<label class="radio-inline">
								{!! Form::radio('sex', 'F', (!empty($user->sex) && $user->sex == 'F' ? 'F' : '')) !!} {{ trans('users.gender.F') }}
								</label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('users.phone') }}</label>
							<div class="col-md-6">
								<input type="tel" class="form-control" name="phone" value="{{ $user->phone or old('phone') }}">
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
									{{ trans('buttons.update') }}
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
