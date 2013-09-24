<?php namespace Pongo\Cms\Support\Repositories;

use Pongo\Cms\Models\Element as Element;

class ElementRepositoryEloquent implements ElementRepositoryInterface {

	public function countElements($element, $element_id)
	{
		return $element->pivot->where('element_id', $element_id)->count();
	}

	public function createElement($element_arr)
	{
		return Element::create($element_arr);
	}

	public function getElement($element_id)
	{
		return Element::find($element_id);
	}

	public function saveElement($element)
	{
		return $element->save();
	}

	public function updateElementOrder($element, $order)
	{
		return $element->pivot->update(array('order_id' => $order));
	}

}