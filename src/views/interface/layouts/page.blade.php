@extends('cms::interface.templates.default')

@section('header')
	<h1>HEADER</h1>
@stop

@section('footer')
	<h1>FOOTER</h1>
@stop

@section('layout')

	<div class="page">

		@yield('content')

	</div>

@stop