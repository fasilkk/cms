{{-- */ if(!isset($pageid)) $pageid = 0; /* --}}

<div class="page-bar">

	<div class="page-body">

		<header>

			<h2>{{t('heading.page.bar_title')}}</h2>

			<div class="page-controls">
				<i class="icon-plus-sign-alt" data-action="expand-all"></i>
				<i class="icon-minus-sign-alt" data-action="collapse-all"></i>
			</div>

			<select id="change-lang" class="form-control">
				@foreach(Config::get('cms::settings.languages') as $lang => $label)
					<option value="{{$lang}}"{{selected($lang, LANG)}}>{{$label}}</option>
				@endforeach
			</select>

			<button id="create-page" class="btn btn-primary loading">
				<i class="icon-plus-sign"></i> {{t('form.button.page')}}
			</button>
			
		</header>
		
		@foreach(Config::get('cms::settings.languages') as $lang => $label)
		<div class="dd" rel="{{$lang}}">	
			
			<ol class="dd-list">

				{{Render::pageList(0, $lang, $pageid)}}

			</ol>

		</div>
		@endforeach

	</div>

</div>