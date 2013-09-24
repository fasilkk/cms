<div class="element-bar">

	<div class="element-body">

		<header>

			<h2>{{t('heading.element.bar_title')}}</h2>

			<button id="create-element" class="btn btn-primary">
				<i class="icon-plus-sign"> {{t('form.button.element')}}</i>
			</button>

			<input type="hidden" name="pageid" value="{{$id}}">

		</header>

		<div class="dl">

			<ol class="dl-list">

				{{Render::elementList($id)}}

			</ol>

		</div>

	</div>

</div>