@extends('layouts.master')

@section('content')
	@if ( $errors-> count() > 0)
		<p>Please review the following error messages:</p>
		<ul>
			@foreach ( $errors->all() as $message )
				<li>{{ $message }}</li>
			@endforeach
		</ul>
	@endif
	{{ link_to_route('list', 'Return to  list') }}
	{{ Form::open(array('url' => 'new', 'class' => 'form-horizontal', 'role' => 'form')) }}
		<div class="form-group">
			{{ Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('name', null, array('class' => 'form-control')) }}
			</div> 
		</div>
		<div class="form-group">
			{{ Form::label('amount', 'Amount', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('amount', null, array('class' => 'form-control')) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('description', 'Description', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::textarea('description', null, array('class' => 'form-control', 'rows' => 3)) }}
			</div>
		</div>
		<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
				{{ Form::submit('Submit', array('class' => 'btn btn-default')) }}
			</div>
		</div>
	{{ Form::close() }}
@stop