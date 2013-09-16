<?php namespace Pongo\Cms\Controllers;

use Pongo\Cms\Models\Page;
use Input, Redirect, Auth, Pongo;

class ElementController extends BaseController {

	public function __construct()
	{
		parent::__construct();

		$this->beforeFilter('pongo.auth');
	}

	/**
	 * Show element edit page
	 * 
	 * @param  int $id
	 * @return string     view page
	 */
	public function editElement($id)
	{
		$view = Pongo::view('sections.element.settings');
		$view['id'] = $id;

		return $view;
	}

}