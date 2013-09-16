<?php namespace Pongo\Cms\Classes;

use Pongo\Cms\Models\Page;
use Pongo as Cms;

class Pager {
	
	public function __construct()
	{
		
	}

	/**
	 * Create element list by page_id
	 * 
	 * @param  int $page_id    page id
	 * @return string          element itwm view
	 */
	public function createElement($page_id)
	{
		$items = Page::find($page_id)->elements;

		$item_view = Cms::view('partials.elementitem');
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
	public function createPage($parent_id, $lang)
	{
		$items = Page::where('parent_id', $parent_id)
					 ->where('lang', $lang)
					 ->orderBy('order_id')
					 ->get();

		$item_view = Cms::view('partials.pageitem');
		$item_view['items'] = $items;

		return $item_view;
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
	 * Get Class name back
	 * 
	 * @return string Name of the class
	 */
	public function name()
	{
		return get_class($this);
	}
	
}