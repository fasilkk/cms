@extends('cms::templates.default')

@section('page-bar')
	@include('cms::partials.pagebar')
@stop

@section('footer-js')
	@parent
	{{Render::asset('scripts/sections/page.js')}}
@stop

@section('layout')
	
	<div class="wrapper">

		{{Pongo::showAlert()}}

		@include('cms::partials.navbar')

		@yield('subbar')		

		<div id="page" class="layout">

			<div class="row">

				<div id="page-panel" class="col-xs-12">

					<div id="overlay"></div>

					@yield('content')

				</div>

			</div>

			@yield('element-bar')

			@yield('option-bar')

		</div>
		
		<footer>PongoCMS v2.0.0 &copy; Pongoweb.it</footer>

	</div>

@stop