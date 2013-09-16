<div class="row">
	<div class="subbar">

		<div class="box">

			<h2>
				{{$page_name}}
			</h2>

		</div>

		<button type="button" class="subbar-toggle options-toggle">
			<i class="icon-cogs"></i>
		</button>

		<button type="button" class="subbar-toggle element-toggle">
			<i class="icon-sort-by-attributes"></i>
			@if($n_elements > 0)
			<span>{{$n_elements}}</span>
			@endif
		</button>

	</div>
</div>