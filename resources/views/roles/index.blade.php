@extends('layout')

@section('body')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
    				{{ $sitetitle or trans('roles.titles.management') }}
                </div>

				<div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">

                        </div>
                        <div class="col-md-5">
                            {!! Form::open(['route' => 'roles-list', 'method' => 'get', 'class' => 'form', 'role' => 'form']) !!}
                            <div class="input-group">
                            <input type="text" class="form-control" name="search" value="{{ $search or '' }}" placeholder="{{ trans('roles.search') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                            </div>
                            </form>

                        </div>
                        <div class="col-md-2">
                            @if ($auth->user()->can('role-add'))
                            <a href="{{ route('role-add') }}" class="btn btn-primary pull-right">{{ trans('roles.titles.add') }}</a>
                            @endif
                        </div>
                    </div>

                    <hr>

                    @if (!empty($roles))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ trans('roles.role') }}</th>
                                    <th>{{ trans('roles.description') }}</th>
                                    @if ($auth->user()->can('role-edit'))
                                    <th></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr class="{{-- ($user->is_active ? '' : 'danger') --}}">
                                    <td>{{ $role->role }}</td>
                                    <td>{{ $role->description }}</td>
                                    @if ($auth->user()->can('role-edit') || $auth->user()->can('user-info'))
                                    <td>
                                        <div class="btn-group btn-group-xs pull-right">
                                        @if ($auth->user()->can('user-edit'))
                                        <a class="btn btn-default" href="{{ route('role-edit', ['id' => $role->id]) }}">{{ trans('buttons.edit') }}</a>
                                        @endif
                                        </div>
                                        </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
