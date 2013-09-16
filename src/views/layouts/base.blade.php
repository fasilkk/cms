@extends('cms::templates.default')

@section('header')
	@include('cms::partials.navbar')
@stop

@section('page-bar')
	@include('cms::partials.pagebar')
@stop

@section('footer-js')
	@parent
	{{Pongo::asset('scripts/sections/page.js')}}
@stop

@section('layout')
	
	@yield('subbar')

	<div id="page" class="layout">

		<div class="row">

			<div id="page-panel" class="col-xs-12">

				@yield('content')

			</div>

		</div>

		@yield('element-bar')

		@yield('option-bar')

	</div>

@stop