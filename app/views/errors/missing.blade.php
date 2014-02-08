@extends('layouts.master')

@section('content')
	<h2>Page not found</h2>
	{{ link_to_route('list', 'Return to list') }}
@stop