<?php namespace Pongo\Cms\Support\Repositories;

use Pongo\Cms\Models\Page as Page;

class PageRepositoryEloquent implements PageRepositoryInterface {

	public function countPageElements($page)
	{
		return $page->elements->count();
	}

	public function createPage($page_arr)
	{
		return Page::create($page_arr);
	}

	public function deletePageElements($element)
	{
		return $element->pivot->delete();
	}

	public function getPage($page_id)
	{
		return Page::find($page_id);
	}

	public function getPageBySlug($slug)
	{
		return Page::where('slug', $slug)
				   ->where('is_valid', 1)
				   ->first();
	}

	public function getPageElements($page_id)
	{
		return Page::find($page_id)->elements;
	}

	public function getPageList($parent_id, $lang)
	{
		return Page::where('parent_id', $parent_id)
				   ->where('lang', $lang)
				   ->orderBy('order_id')
				   ->get();
	}

	public function getLangHomePage()
	{
		return Page::where('lang', LANG)
				   ->where('is_home', 1)
				   ->first();
	}

	public function getLangHomePages()
	{
		return Page::where('lang', LANG)
				   ->where('is_home', 1)
				   ->first();
	}

	public function getSubPages($page_id)
	{
		return Page::where('parent_id', $page_id)->get();
	}

	public function resetHomePage()
	{
		return Page::where('lang', LANG)
				   ->where('is_home', 1)
				   ->update(array('is_home' => 0));
	}

	public function savePage($page)
	{
		return $page->save();
	}

	public function savePageElement($page, $element, $order)
	{
		return $page->elements()->save($element, array('order_id' => $order));
	}

}