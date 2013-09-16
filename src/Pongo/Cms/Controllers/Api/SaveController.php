<?php namespace Pongo\Cms\Controllers\Api;

use Auth, Alert, Controller, Pongo, Redirect;

class SaveController extends ApiController {

	public function __construct()
	{
		parent::__construct();

		$this->beforeFilter('pongo.auth.api');
	}

	/**
	 * Testing...
	 * 
	 * @return void
	 */
	public function save()
	{
		$array = array(
			'status' 	=> 'success',
			'msg'		=> 'Salvataggio avvenuto con successo'
		);

		return json_encode($array);
	}

	public function error()
	{
		$array = array(
			'status' 	=> 'error',
			'msg'		=> 'Si è verificato un errore'
		);

		return json_encode($array);
	}

	public function expire()
	{
		Auth::logout();
		
		$msg = t('alert.error.session_exp');

		Alert::error($msg)->flash();

		return json_encode(
			array(
				'status' => 'error',
				'type' => 'expired'
			)
		);
	}

}