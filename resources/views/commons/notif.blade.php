<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @if (count($errors) > 0)
        	<div class="alert alert-danger">
        		<ul class="list-unstyled">
        			@foreach ($errors->all() as $error)
        				<li>{!! $error !!}</li>
        			@endforeach
        		</ul>
        	</div>
        @elseif (Session::has('success'))
            <div class="alert alert-success">
            @if (is_array(Session::get('success')) && count(Session::get('success')) > 0)
                <ul class="list-unstyled">
        			@foreach (Session::get('success') as $success)
        				<li>{!! $success !!}</li>
        			@endforeach
        		</ul>
            @else
            {!! Session::get('success') !!}
            @endif
            </div>
        @endif
        </div>
    </div>
</div>