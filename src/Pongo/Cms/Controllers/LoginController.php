<?php namespace Pongo\Cms\Controllers;

use Auth, Alert, Input, Redirect, Render, Session, Pongo;

class LoginController extends BaseController {
	
	public function __construct()
	{
		parent::__construct();

		$this->beforeFilter('pongo.guest');
	}

	public function index()
	{
		// Js page repository
		// Render::assetAdd('footer', 'login', 'scripts/pages/login.js');

		return Render::view('sections.login.login');
	}

	public function login()
	{
		$credentials = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);

		if (Auth::attempt($credentials)) {

			$this->setConstants();

			Alert::info(t('alert.info.welcome', array('user' => Input::get('username'))))->flash();

			return Redirect::route('dashboard');

		} else {

			Alert::error(t('alert.error.login'))->flash();

			return Redirect::route('login.index');
		}
	}

	/**
	 * Set constants values on login
	 */
	protected function setConstants()
	{
		Session::put('USERID', Auth::user()->id);
		Session::put('USERNAME', Auth::user()->username);
		Session::put('EMAIL', Auth::user()->email);
		Session::put('ROLEID', Auth::user()->role->id);
		Session::put('ROLENAME', Auth::user()->role->name);
		Session::put('LEVEL', Auth::user()->role->level);
		Session::put('LANG', Auth::user()->lang);
		Session::put('INTERFACE', Auth::user()->lang);
		Session::put('EDITOR', Auth::user()->editor);
	}

}