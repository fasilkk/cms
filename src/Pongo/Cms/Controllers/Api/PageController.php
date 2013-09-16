<?php namespace Pongo\Cms\Controllers\Api;

use Pongo\Cms\Models\Element;
use Pongo\Cms\Models\Page;
use Config, DB, Input, Pager, Session, Str;

class PageController extends ApiController {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Set the new LANG constant
	 * 
	 * @return string json encoded object
	 */
	public function changeLang()
	{
		if(Input::has('lang')) {

			$lang = Input::get('lang');
			$label = Config::get('cms::settings.languages.'.$lang);

			Session::put('LANG', $lang);

			$response = array(
				'status' 	=> 'info',
				'msg'		=> t('alert.info.page_lang', array('lang' => $label))
			);

		} else {

			$response = array(
				'status' 	=> 'error',
				'msg'		=> t('alert.error.page_lang')
			);

		}

		return json_encode($response);
	}

	/**
	 * Create a new page
	 * 
	 * @return string json encoded object
	 */
	public function createPage()
	{
		if(Input::has('lang')) {

			$lang = Input::get('lang');
			$name = t('template.page.new', array(), $lang);

			$page_arr = array(
				'parent_id' => 0,
				'lang' => $lang,
				'name' => $name,
				'slug' => '/' . Str::slug($name),
				'title' => $name,
				'access_level' => 0,
				'author_id' => USERID,
				'role_id' => ROLEID,
				'role_level' => LEVEL,
				'order_id' => Config::get('cms::system.default_order'),
				'is_valid' => 0
			);

			$page = Page::create($page_arr);

			$response = array(
				'status' 	=> 'success',
				'msg'		=> t('alert.success.page_created'),
				'id'		=> $page->id,
				'name'		=> $name,
				'url'		=> route('page.settings', array('id' => $page->id)),
				'cls'		=> 'new',
				'lang'		=> $lang
			);

		} else {

			$response = array(
				'status' 	=> 'error',
				'msg'		=> t('alert.error.page_created')
			);

		}

		return json_encode($response);
	}

	/**
	 * Re-order pages on Nestable drag&drop
	 * 
	 * @return string json encoded object
	 */
	public function orderPages()
	{
		if(Input::has('pages')) {

			$pages = json_decode(Input::get('pages'), true);

			// Recursive update
			$this->updateOrderRecursivePage($pages, 0);

			$response = array(
				'status' 	=> 'success',
				'msg'		=> t('alert.success.page_order')
			);

		} else {

			$response = array(
				'status' 	=> 'error',
				'msg'		=> t('alert.error.page_order')
			);

		}		

		return json_encode($response);
	}

	/**
	 * Reorder recursive pages
	 * 
	 * @param  array $pages
	 * @param  int $parent
	 * @return void
	 */
	protected function updateOrderRecursivePage($pages, $parent)
	{
		foreach ($pages as $key => $page_arr) {

			// Get page ID
			$pid = $page_arr['id'];

			// Update pages 1st level
			$page = Page::find($pid);
			$page->parent_id = $parent;
			$page->order_id = $key + 1;
			$page->save();

			$page->slug = Pager::pageTree($page->id, 'slug', '/');
			$page->save();

			// Recursive update
			if(array_key_exists('children', $page_arr)) {
				$this->updateOrderRecursivePage($page_arr['children'], $pid);
			}

		}
	}


}