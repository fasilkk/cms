<?php namespace Pongo\Cms\Support\Repositories;

interface ElementRepositoryInterface {

	public function countElements($element, $element_id);

	public function createElement($element_arr);

	public function getElement($element_id);

	public function saveElement($element);

	public function updateElementOrder($element, $order);
	
}