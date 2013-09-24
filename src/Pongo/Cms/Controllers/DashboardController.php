<?php namespace Pongo\Cms\Controllers;

use Input, Redirect, Render;

class DashboardController extends BaseController {

	public function __construct()
	{
		parent::__construct();

		$this->beforeFilter('pongo.auth');
	}

	public function showDashboard()
	{
		return Render::view('sections.dashboard.dashboard');
	}

}