<?php namespace Pongo\Cms\Controllers;

use Input, Redirect, Auth, Alert, Pongo;

class LoginController extends BaseController {
	
	public function __construct()
	{
		parent::__construct();

		$this->beforeFilter('pongo.guest');
	}

	public function index()
	{

		// Js page repository
		Pongo::add_asset('footer', 'login', 'scripts/pages/login.js');

		return Pongo::view('pages.login');
	}

	public function login()
	{

		Alert::error('Login non riuscito!')->flash();

		return Redirect::route('login.index');

	}

}