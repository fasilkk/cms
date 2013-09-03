<?php namespace Pongo\Cms\Support\Repositories;

interface PageRepositoryInterface {

	public function all();

	public function find($id);

	public function create($input);

	public function update($id);

	public function delete($id);
	
}