@extends('cms::layouts.base')

@section('header')
	@parent
@stop

@section('element-bar')	
	@include('cms::partials.elementbar')
@stop

@section('subbar')
	
	<div class="row">
		<div class="subbar">

			<div class="box">

				<h2>New Element <span>Home page / New page</span></h2>

			</div>

			<button type="button" class="subbar-toggle element-toggle">
				<i class="icon-sort-by-attributes"></i>
			</button>

		</div>
	</div>

@stop