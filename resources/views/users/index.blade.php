@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
    				{{ $sitetitle or trans('users.titles.management') }}
                </div>

				<div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">

                        </div>
                        <div class="col-md-5">
                            {!! Form::open(['route' => 'users-list', 'method' => 'get', 'class' => 'form', 'role' => 'form']) !!}
                            <div class="input-group">
                            <input type="text" class="form-control" name="search" value="{{ $search or '' }}" placeholder="{{ trans('users.search') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                            </div>
                            </form>

                        </div>
                        <div class="col-md-2">
                            @if ($auth->user()->can('user-add'))
                            <a href="{{ route('user-add') }}" class="btn btn-primary pull-right">{{ trans('users.titles.add') }}</a>
                            @endif
                        </div>
                    </div>

                    <hr>

                    @if (!empty($users))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ trans('auth.username') }}</th>
                                    <th>{{ trans('users.name') }}</th>
                                    <th>{{ trans('users.email') }}</th>
                                    <th>{{ trans('users.role') }}</th>
                                    @if ($auth->user()->can('user-edit') || $auth->user()->can('user-info'))
                                    <th></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="{{-- ($user->is_active ? '' : 'danger') --}}">
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    @if ($auth->user()->can('user-edit') || $auth->user()->can('user-info'))
                                    <td>
                                        <div class="btn-group btn-group-xs pull-right">
                                        @if ($auth->user()->can('user-info'))
                                        <a class="btn btn-default" href="{{ route('user-info', ['id' => $user->id]) }}">{{ trans('buttons.view') }}</a>
                                        @endif
                                        @if ($auth->user()->can('user-edit'))
                                        <a class="btn btn-default" href="{{ route('user-edit', ['id' => $user->id]) }}">{{ trans('buttons.edit') }}</a>
                                        @endif
                                        </div>
                                        </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! (!empty($users->render()) ? $users->appends(['search' => $search])->render() : '') !!}
                    @endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
