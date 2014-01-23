@extends('layouts.master')

@section('content')
	<h2>404 Not Found</h2>
	{{ link_to_route('list', 'Return to list') }}
@stop