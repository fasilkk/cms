<?php namespace Pongo\Cms\Controllers\Api;

use Pongo\Cms\Models\Element;
use Pongo\Cms\Models\Page;
use Config, DB, Input, Session, Str;

class ElementController extends ApiController {

	public function __construct()
	{
		parent::__construct();
	}

	public function createElement()
	{
		if(Input::has('lang') and Input::has('pid')) {

			$pid = Input::get('pid');

			$lang = Input::get('lang');

			$label = t('template.element.new', array(), $lang);

			$element_arr = array(
				'lang' => $lang,
				'name' => snake_case($label),
				'label' => $label,
				'text' => '',
				'zone' => 0,
				'author_id' => USERID,
				'is_valid' => 0
			);

			$element = new Element($element_arr);

			$page = Page::find($pid);

			$count_el = $page->elements()->count();

			$element = $page->elements()->save($element, array('order_id' => Config::get('cms::system.default_order')));

			$response = array(
				'status' 	=> 'success',
				'msg'		=> t('alert.success.element_created'),
				'id'		=> $element->id,
				'label'		=> $element->label,
				'url'		=> route('element.edit', array('id' => $element->id)),
				'cls'		=> 'new',
				'count'		=> ($count_el + 1)
			);

		} else {

			$response = array(
				'status' 	=> 'error',
				'msg'		=> t('alert.error.element_created')
			);

		}

		return json_encode($response);
	}

	/**
	 * Reorder page elements
	 * 
	 * @return string json encoded object
	 */
	public function orderElements()
	{
		if(Input::has('elements') and Input::has('pid')) {

			$elements = json_decode(Input::get('elements'), true);			
			$pid = Input::get('pid');

			// Recursive update
			$this->updateOrderElement($elements, $pid);

			$response = array(
				'status' 	=> 'success',
				'msg'		=> t('alert.success.element_order')
			);

		} else {

			$response = array(
				'status' 	=> 'error',
				'msg'		=> t('alert.error.element_order')
			);

		}		

		return json_encode($response);
	}

	/**
	 * Reorder recursive elements
	 * 
	 * @param  array $elements
	 * @param  int $page_id
	 * @return void
	 */
	protected function updateOrderElement($elements, $page_id)
	{
		foreach ($elements as $key => $element_arr) {
			
			// Get element ID
			$eid = $element_arr['id'];

			DB::table('element_page')
			  ->where('page_id', $page_id)
			  ->where('element_id', $eid)
			  ->update(array('order_id' => $key + 1));
		}
	}

}