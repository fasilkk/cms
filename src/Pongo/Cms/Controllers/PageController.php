<?php namespace Pongo\Cms\Controllers;

use Pongo\Cms\Models\Page;
use Input, Redirect, Auth, Pongo;

class PageController extends BaseController {

	public function __construct()
	{
		parent::__construct();

		$this->beforeFilter('pongo.auth');
	}

	public function layoutPage()
	{

	}

	public function linkPage()
	{
		
	}

	public function mediaPage()
	{
		
	}

	public function seoPage()
	{
		
	}

	/**
	 * Show page edit settings
	 * 
	 * @param  int $id
	 * @return string     view page
	 */
	public function settingsPage($id)
	{
		$page = Page::find($id);

		// Count element per page
		$n_elements = $page->elements->count();

		$view = Pongo::view('sections.page.settings');
		$view['id'] = $id;
		$view['page_name'] = $page->name;
		$view['n_elements'] = $n_elements;

		return $view;
	}

}