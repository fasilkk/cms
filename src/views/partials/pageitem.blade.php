@foreach($items as $key => $item)

	@if($key == 0)
	<ol class="dd-list">
	@endif

		<li class="dd-item" data-id="{{$item->id}}">
			<div class="dd-handle">

				@if($item->is_home == 1)
				<i class="icon-home"></i>
				@endif
				
				{{Tool::unChecked($item->is_valid)}}
				{{$item->name}}

			</div>
			<a href="{{route('page.settings', array('id' => $item->id))}}">
				<i class="icon-chevron-right"></i>
			</a>

			@if($item->id > 0)
			{{Pager::createPage($item->id, $item->lang)}}
			@endif

		</li>

	@if($key == count($items) - 1)
	</ol>
	@endif

@endforeach