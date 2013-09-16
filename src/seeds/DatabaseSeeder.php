<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Disable mass-assignment protection
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('PagesTableSeeder');
		$this->call('ElementsTableSeeder');
		$this->call('ElementPageTableSeeder');

		$this->command->info('PongoCMS seeded!');
	}

}