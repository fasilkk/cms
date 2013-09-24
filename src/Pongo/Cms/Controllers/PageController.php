<?php namespace Pongo\Cms\Controllers;

use Pongo\Cms\Support\Repositories\PageRepositoryEloquent as Page;
use Pongo\Cms\Support\Repositories\RoleRepositoryEloquent as Role;
use Config, Render;

class PageController extends BaseController {

	public function __construct(Page $page, Role $role)
	{
		parent::__construct();

		$this->beforeFilter('pongo.auth');

		$this->page = $page;
		$this->role = $role;
	}

	public function deletedPage()
	{
		return Render::view('sections.page.deleted');
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
		$page = $this->page->getPage($id);

		// Available roles
		// $roles = Role::orderBy('level', 'asc')->get();
		$roles = $this->role->orderBy('level', 'asc');

		// Role admin array
		$admin_roles = \Tool::adminRoles($roles);

		// Count element per page
		$n_elements = $this->page->countPageElements($page);

		// Share page id with all views
		\View::share('pageid', $id);

		$view = Render::view('sections.page.settings');
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
		$view['wrapper_id']		= $page->wrapper_id;
		
		$view['roles']			= $roles;
		$view['admin_roles'] 	= $admin_roles;
		$view['wrappers']		= Config::get('cms::system.wrappers');
		
		$view['n_elements'] 	= $n_elements;

		return $view;
	}

}