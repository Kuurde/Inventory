@extends('layouts.master')

@section('content')
	{{ link_to_route('getNew', 'Add new item') }}
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Amount</th>
				<th>Description</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		@foreach($items as $item)
			<tr>
				<td>{{{ $item->name }}}</td>
				<td>{{{ $item->amount }}}</td>
				<td>{{{ $item->description }}}</td>
				<td><a href="{{ route('getEdit', $item->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
				<td><a href="{{ route('delete', $item->id) }}"><span class="glyphicon glyphicon-remove-circle"></span></a></td>
			</tr>
		@endforeach
		</tbody>
	</table>
@stop
