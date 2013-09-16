@foreach($items as $element)
	<li class="dl-item" data-id="{{$element->id}}">

		<div class="dl-handle">
			
			{{Tool::unChecked($element->is_valid)}}
			{{$element->label}}

		</div>

		<a href="{{route('element.edit', array('id' => $element->id))}}">
			<i class="icon-chevron-left"></i>
		</a>

	</li>
@endforeach