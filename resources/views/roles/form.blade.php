@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-{{ (!empty($user) && $user->is_active == 0 ? 'danger' : 'default') }}">
				<div class="panel-heading">{!! $sitetitle or trans('roles.titles.profile') !!}</div>

				<div class="panel-body">
					{!! Form::open(['route' => 'role-save', 'class' => 'form-horizontal', 'role' => 'form', 'files' => true]) !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{ $role->id or '' }}">

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('roles.role') }}</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="role" value="{{ $role->role or old('role') }}" {{ (!empty($role->id) ? 'readonly' : 'required') }}>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('roles.description') }}</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="description" value="{{ $role->description or old('description') }}">
							</div>
						</div>

						<hr>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('roles.permissions') }}</label>
							<div class="col-md-6">
                                <div class="row">
                                    @if (!empty($permissions))
                                    @foreach ($permissions as $permission)
                                    <div class="col-md-6">
                                        <label>
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" {!! (!empty($inroles) && in_array($permission->id,$inroles) ? 'checked' : '') !!}> {{ $permission->permission }}
                                        </label>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
							</div>
						</div>

						<hr>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									{{ trans('buttons.save') }}
								</button>
								<a class="btn btn-default" href="{{ route('roles-list') }}"><i class="fa fa-arrow-left"></i> {{ trans('roles.titles.management') }}</a>

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
