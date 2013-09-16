@extends('cms::layouts.base')

@section('header')	
	@parent
@stop

@section('footer-js')
	@parent
	{{--Pongo::asset('scripts/sections/dashboard.js')--}}
@stop

@section('content')

	<h1>Dashboard</h1>

	{{Form::open()}}
		
		{{link_to_route('api.save', 'Save', null, array('class' => 'btn btn-default api save'))}}
		{{link_to_route('api.error', 'Delete', null, array('class' => 'btn btn-default api'))}}
		{{link_to_route('api.expire', 'Expire session', null, array('class' => 'btn btn-default api'))}}

	{{Form::close()}}	

@stop