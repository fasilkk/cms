@foreach($items as $key => $item)

	@if($parent_id > 0)
	<ol class="dd-list">
	@endif

	<li class="dd-item" data-id="{{$item->id}}">
		
		<div class="dd-handle">

			{{Tool::isHome($item->is_home)}}
			
			{{Tool::unChecked($item->is_valid)}}

			<span>{{$item->name}}</span>

		</div>
		
		<a href="{{route('page.settings', array('id' => $item->id))}}"{{active($item->id, $pageid)}}>
			
			<i class="icon-chevron-right"></i>

		</a>

		@if($item->id > 0)

			{{Render::pageList($item->id, $item->lang, $pageid)}}

		@endif

	</li>

	@if($parent_id > 0)
	</ol>
	@endif

@endforeach