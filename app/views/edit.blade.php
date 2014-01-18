@extends('layouts.master')

@section('content')
	{{ link_to_route('list', 'Return to list') }}
	{{ Form::model($item, array('route' => array('postEdit', $item->id))) }}
		<table>
			<tr>
				<td>{{ Form::label('name', 'Name') }}</td>
				<td>{{ Form::text('name') }} </td>
			</tr>
			<tr>
				<td>{{ Form::label('amount', 'Amount') }}</td>
				<td>{{ Form::text('amount') }}</td>
			</tr>
			<tr>
				<td>{{ Form::label('description', 'Description') }}</td>
				<td>{{ Form::text('description') }}</td>
			</tr>
			<tr>
				<td></td>
				<td>{{ Form::submit('Submit') }}</td>
			</tr>
		</table>
	{{ Form::close() }}
@stop