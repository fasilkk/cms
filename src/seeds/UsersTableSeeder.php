<?php

use Pongo\Cms\Models\User;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Reset table
		DB::table('users')->truncate();

		$admin_account = Config::get('cms::settings.admin_account');

		$admin_settings = 	array(
								'role_id' => 1,
								'lang' => Config::get('cms::settings.language')
							);

		$admin_user = array_merge($admin_account, $admin_settings);
		
		$admin_user['password'] = Hash::make($admin_user['password']);
		
		User::create($admin_user);

	}

}
