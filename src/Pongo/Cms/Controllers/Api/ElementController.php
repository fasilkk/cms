<?php namespace Pongo\Cms\Controllers\Api;

use Pongo\Cms\Support\Repositories\PageRepositoryEloquent as Page;
use Pongo\Cms\Support\Repositories\ElementRepositoryEloquent as Element;
use Config, DB, Input, Session, Str;

class ElementController extends ApiController {

	public function __construct(Page $page, Element $element)
	{
		parent::__construct();

		$this->page = $page;
		$this->element = $element;
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

			$element = $this->element->createElement($element_arr);

			$page = $this->page->getPage($pid);

			$count_el = $this->page->countPageElements($page);

			$element = $this->page->savePageElement($page, $element, Config::get('cms::system.default_order'));

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

			$mod_elements = json_decode(Input::get('elements'), true);

			$pid = Input::get('pid');

			$elements = $this->page->getPageElements($pid);

			// Reorder order id

			foreach ($mod_elements as $key => $el) {

				foreach ($elements as $element) {

					if($element->id == $el['id']) 
						$this->element->updateElementOrder($element, $key + 1);
				}				
			}

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

}