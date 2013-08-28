<?php namespace Pongo\Cms\Controllers;

use /*App, */View, Config, Input, Auth, Lang;

use Pongo\Cms\Support\Repositories\UserRepositoryInterface;


class DashboardController extends BaseController {

	protected $users;

	public function __construct(UserRepositoryInterface $users)
	{
		parent::__construct();

		$this->users = $users;

		// $this->beforeFilter('pongo.auth');
	}

	public function index()
	{

		return View::make('cms::interface.dashboard');
	}

}