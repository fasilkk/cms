@extends('cms::layouts.base')

@section('header')	
	@parent
@stop

@section('footer-js')
	@parent
	{{--Render::asset('scripts/sections/dashboard.js')--}}
@stop

@section('content')

	<h1>Dashboard</h1>



@stop