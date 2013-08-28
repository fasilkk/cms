<?php namespace Pongo\Cms\Support\Repositories;

use User;

class UserRepositoryEloquent implements UserRepositoryInterface {

	public function all()
	{
		return User::all();
	}

	public function find($id)
	{
		return User::find($id);
	}

	public function create($input)
	{
		return User::create($input);
	}

}