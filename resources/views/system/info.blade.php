@extends('layout')

@section('body')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $sitetitle or trans('system.title') }}</div>

				<div class="panel-body">
                    <div class="form-horizontal">
                        @if (!empty($infos))
                        @foreach ($infos as $key => $value)
                        <div class="form-group">
							<label class="col-md-4 control-label">{{ trans('system.'.$key) }}</label>
							<div class="col-md-6">
								<p class="form-control-static">{{ $value }}</p>
							</div>
						</div>
						@endforeach
						@endif
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
