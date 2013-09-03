<?php namespace Pongo\Cms\Controllers;

use Pongo, Config, Input, Auth, Lang, Asset;
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
		return Pongo::view('interface.partials.dashboard');
	}

}