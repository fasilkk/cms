<?php namespace Pongo\Cms\Support\Repositories;

interface UserRepositoryInterface {

	public function all();

	public function find($id);

	public function create($input);
	
}