@extends('layouts.master')

@section('content')
	{{ link_to_route('getNew', 'Add new item') }}
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
				<td>{{ link_to_route('getEdit', 'Edit', $item->id) }}</td>
				<td>{{ link_to_route('delete', 'Delete', $item->id) }}</td>
			</tr>
		@endforeach
	</table>
@stop
