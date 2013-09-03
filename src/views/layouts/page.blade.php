@extends('cms::templates.default')

@section('header')
	<h1>HEADER</h1>
@stop

@section('footer')
	@parent
	<h1>FOOTER</h1>
@stop

@section('layout')

	<div class="page">

		@yield('content')

	</div>

@stop