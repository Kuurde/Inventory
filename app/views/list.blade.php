@extends('layouts.master')

@section('content')
	<a href="{{ URL::to('new') }}">Add item</a>
	<table>
		<tr>
			<th>Name</th>
			<th>Amount</th>
			<th>Description</th>
		</tr>
		@foreach($items as $item)
			<tr>
				<td>{{{ $item->name }}}</td>
				<td>{{{ $item->amount }}}</td>
				<td>{{{ $item->description }}}</td>
				<td>Edit</td>
				<td>Delete</td>
			</tr>
		@endforeach
	</table>
@stop
