@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
    				{{ $sitetitle or trans('users.titles.management') }}
    				@if ($auth->user()->can('user-add'))
                    <a href="{{ route('user-add') }}" class="btn btn-primary pull-right btn-xs">{{ trans('users.titles.add') }}</a>
                    @endif
                </div>

				<div class="panel-body">


                    @if (!empty($users))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ trans('auth.username') }}</th>
                                    <th>{{ trans('users.name') }}</th>
                                    <th>{{ trans('users.email') }}</th>
                                    @if ($auth->user()->can('user-edit') || $auth->user()->can('user-info'))
                                    <th></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
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
                        {!! $users->render() !!}
                    @endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
