<?php namespace Pongo\Cms\Controllers;

use Pongo\Cms\Models\Page;
use Pongo\Cms\Models\Role;
use Pongo;

class PageController extends BaseController {

	public function __construct()
	{
		parent::__construct();

		$this->beforeFilter('pongo.auth');
	}

	public function deletedPage()
	{
		return Pongo::view('sections.page.deleted');
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

		// Available roles
		$roles = Role::orderBy('level', 'asc')->get();

		// Role admin array
		$admin_roles = \Tool::adminRoles($roles);

		// Count element per page
		$n_elements = $page->elements->count();

		// Share page id with all views
		\View::share('pageid', $id);

		$view = Pongo::view('sections.page.settings');
		$view['section']	= 'settings';
		$view['id'] 		= $id;
		$view['name'] 		= $page->name;
		$view['slug_last'] 	= \Tool::slugSlice($page->slug, 1);
		$view['slug_base'] 	= \Tool::slugBack($page->slug, 1);
		$view['slug'] 		= $page->slug;
		$view['is_home'] 	= $page->is_home;
		$view['is_valid'] 	= $page->is_valid;
		
		$view['access_level'] 	= $page->access_level;
		$view['role_level'] 	= $page->role_level;
		
		$view['roles']			= $roles;
		$view['admin_roles'] 	= $admin_roles;		
		
		$view['n_elements'] 	= $n_elements;

		return $view;
	}

}