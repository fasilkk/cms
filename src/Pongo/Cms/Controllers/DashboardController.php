<?php namespace Pongo\Cms\Controllers;

use Input, Redirect, Auth, Pongo;

class DashboardController extends BaseController {

	public function __construct()
	{
		parent::__construct();

		$this->beforeFilter('pongo.auth');
	}

	public function showDashboard()
	{
		return Pongo::view('sections.dashboard.dashboard');
	}

}