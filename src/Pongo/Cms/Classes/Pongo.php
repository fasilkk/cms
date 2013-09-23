<?php namespace Pongo\Cms\Classes;

use Pongo\Cms\Models\Page;
use Alert, Asset, Config, View;

class Pongo {	

	/**
	 * Create element list by page_id
	 * 
	 * @param  int $page_id    page id
	 * @return string          element itwm view
	 */
	public function createElement($page_id)
	{
		$items = Page::find($page_id)->elements;

		$item_view = $this->view('partials.elementitem');
		$item_view['items'] = $items;

		return $item_view;
	}

	/**
	 * Create page list recursively
	 * 
	 * @param  int $parent_id 	pages's parent id
	 * @param  string $lang 	available languages
	 * @return string           page item view
	 */
	public function createPage($parent_id, $lang, $pageid = 0)
	{
		$items = Page::where('parent_id', $parent_id)
					 ->where('lang', $lang)
					 ->orderBy('order_id')
					 ->get();

		$item_view = $this->view('partials.pageitem');
		$item_view['items'] = $items;
		$item_view['pageid'] = $pageid;
		$item_view['parent_id'] = $parent_id;

		return $item_view;
	}

	/**
	 * Get actual url segments
	 * -> full, first, last, prev
	 * 
	 * @return array
	 */
	public function getUrl()
	{
		$full_url = $_SERVER['REQUEST_URI'];

		$segments = explode('/', $full_url);

		array_shift($segments);

		$n_segments = count($segments);

		$url_arr = array();

		// full
		$url_arr['full'] = $full_url;

		// first
		$url_arr['first'] = '/' . $segments[0];

		// last
		$url_arr['last'] = '/' . $segments[$n_segments - 1];

		// prev
		$url_arr['prev'] = str_replace($url_arr['last'], '', $full_url);

		return $url_arr;
	}

	/**
	 * Check page role_level against user level
	 * 
	 * @param  int $role_level page role_level
	 * @return void
	 */
	public function grantEdit($role_level)
	{
		$blocked =  ($role_level > LEVEL) ? true : false;

		if($blocked) {

			$response = array(
				'status' 	=> 'error',
				'msg'		=> t('alert.error.not_granted')
			);

			return $response;
		} 
	}

	/**
	 * Create a back recursive site structure of pages
	 * 
	 * @param  int     $id        page id
	 * @param  string  $field     db column to target
	 * @param  string  $separator optional separator
	 * @param  boolean $url       create a url string
	 * @param  boolean $link      make each chunk linkable to its url
	 * @param  string  $context   site or cms context
	 * @return string
	 */
	public function pageTree($id, $field = 'slug', $separator = '', $url = false, $link = false, $context = 'cms')
	{
		if($url) {
			$field = 'slug';
			$separator = '/';
		}

		$str = $this->recursivePageTree($id, $field, $separator, $url, $link, $context);

		$result =  ($url and !$link) ? url($str) : $str;

		return $result;

	}

	/**
	 * Recursive process of pageTree method
	 * 
	 * @param  int     $id        page id
	 * @param  string  $field     db column to target
	 * @param  string  $separator optional separator
	 * @param  boolean $url       create a url string
	 * @param  boolean $link      make each chunk linkable to its url
	 * @param  string  $context   site or cms context
	 * @return string
	 */
	protected function recursivePageTree($id, $field, $separator, $url, $link, $context)
	{
		$page = Page::find($id);

		if($field == 'slug') {
			
			$separator = '';

			$slug_arr = explode('/', $page->$field);

			$page_field = '/' . end($slug_arr);

		} else {

			$page_field = $page->$field;

		}

		if($context == 'cms') {

			$slug = link_to_cms('page/edit/' . $page->id, $page_field);

		} else {

			$slug = link_to($page->slug, $page_field);

		}

		if($page->parent_id == 0) {

			$str = ($link and !$url) ? $slug : $page_field;

		} else {

			if($link and !$url) {

				$str = $this->recursivePageTree($page->parent_id, $field, $separator, $url, $link, $context) . $separator . $slug;

			} else {

				$str = $this->recursivePageTree($page->parent_id, $field, $separator, $url, $link, $context) . $separator . $page_field;

			}

		}

		return $str;				  
	}

	/**
	 * Show alert wrapper
	 * 
	 * @return string Alert message
	 */
	public function showAlert()
	{
		$format = Config::get('cms::system.alert_tpl');

		foreach (Alert::all($format) as $alert) {
			return $alert;
		}
	}

	/**
	 * View::make a Pongo view
	 * 
	 * @param  string $name View location
	 * @param  array  $data Array of data
	 * @return string       View content
	 */
	public function view($name, array $data = array())
	{		
		// Point to cms views
		$view_name = 'cms::' . $name;

		// Set to 'default' view if view not found
		if ( ! View::exists($view_name)) {
			$view_name_arr = explode('.', $view_name);
			$view_name = str_replace(end($view_name_arr), 'default', $view_name);
		}

		return View::make($view_name, $data);
	}

	/**
	 * Get Class name back
	 * 
	 * @return string Name of the class
	 */
	public function className()
	{
		return get_class($this);
	}
	
}