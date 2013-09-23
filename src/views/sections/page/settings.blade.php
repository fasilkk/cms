@extends('cms::layouts.base')

@section('element-bar')
	@include('cms::partials.elementbar')
@stop

@section('option-bar')
	@include('cms::partials.options.page')
@stop

@section('subbar')
	@include('cms::partials.subbar')
@stop

@section('footer-js')
	@parent
	{{Render::asset('scripts/viewmodels/page/settings.js')}}
@stop

@section('content')

	<form role="form" id="page-settings-form">
		<input type="hidden" name="page_id" value="{{$id}}">
		<div class="form-group" rel="name">
			<label for="name" class="control-label">{{t('label.page.settings.name')}}</label>
			<input type="text" name="name" class="form-control" id="name" value="{{$name}}" data-bind="value: pageName, valueUpdate: 'keyup'">
		</div>
		<div class="form-group" rel="slug_last">
			<label for="slug_last" class="control-label">{{t('label.page.settings.slug')}}</label>
			<div class="input-group">
				<span class="input-group-addon">/</span>
				<input type="text" name="slug_last" class="form-control" id="slug_last" value="{{$slug_last}}" data-bind="value: slugLast, valueUpdate: 'keyup'">
				<span class="input-group-btn">
					<button type="button" class="btn btn-default button" data-bind="click: createSlug">{{t('label.page.settings.create_slug')}}</button>
				</span>
			</div>
			<input type="hidden" name="slug_base" id="slug_base" value="{{$slug_base}}">
		</div>
		<div class="form-group">
			<label for="role_level" class="control-label">{{t('label.page.settings.edit_by')}}</label>
			<select name="role_level" class="form-control" id="role_level">
				@foreach($admin_roles as $role => $level)
				<option value="{{$level}}"{{selected($level, $role_level)}}>{{t('form.select.' . $role)}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="access_level" class="control-label">{{t('label.page.settings.browse_by')}}</label>
			<select name="access_level" class="form-control" id="access_level">
				@foreach($roles as $role)
				<option value="{{$role->level}}"{{selected($role->level, $access_level)}}>{{t('form.select.' . $role->name)}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<div class="checkbox">
				<label class="control-label">
					<input type="checkbox" name="is_home" value="1"{{checked($is_home, 1)}} data-bind="checked: pageHomeState">
					<span class="label" data-bind="css: pageHomeStatus">
						{{t('label.page.settings.set_hp')}}
					</span>
				</label>
			</div>
		</div>
		<div class="form-group">
			<div class="checkbox">
				<label class="control-label">
					<input type="checkbox" name="is_valid" value="1"{{checked($is_valid, 1)}} data-bind="checked: pageState">
					<span class="label" data-bind="css: pageStatus">
						<span data-bind="text: pageStatusLabel"></span>
					</span>
				</label>
			</div>
		</div>
		<div class="form-buttons">
			{{link_to_route('api.page.settings.save', t('form.button.save'), null, array('class' => 'btn btn-success btn-block api'))}}
			<a href="#clone-modal" class="btn btn-primary btn-block confirm">{{t('form.button.clone')}}</a>
			<a href="#delete-modal" class="btn btn-danger btn-block pull-right confirm">{{t('form.button.delete')}}</a>
		</div>
	</form>

@stop



@section('modal')
	
	<div class="modal-box" id="clone-modal">
		<button type="button" class="close">&times;</button>
		<h3>Clone this page</h3>
		<form action="{{route('api.page.settings.clone')}}">
			<div class="form-group">
				<label for="access_level" class="control-label">{{t('label.page.settings.browse_by')}}</label>
				<select name="access_level" class="form-control" id="access_level">
					@foreach($roles as $role)
					<option value="{{$role->level}}"{{selected($role->level, $access_level)}}>{{t('form.select.' . $role->name)}}</option>
					@endforeach
				</select>
			</div>
		</form>
	</div>

	<div class="modal-box" id="delete-modal">
		<button type="button" class="close close-modal">&times;</button>
		<h3>{{t('modal.title.delete_page')}}</h3>
		<form action="{{route('api.page.settings.delete')}}" method="POST">
			<input type="hidden" name="page_id" value="{{$pageid}}">
			<div class="form-group">
				<div class="checkbox">
					<label class="control-label">
						<input type="checkbox" name="force_delete" value="1">
						{{t('label.page.settings.force_delete')}}
					</label>
				</div>
			</div>
			<div class="form-buttons">
				<button type="submit" class="btn btn-danger">{{t('form.button.ok')}}</button>
				<button type="button" class="btn btn-default button close-modal">{{t('form.button.cancel')}}</button>
			</div>
		</form>

	</div>

@stop