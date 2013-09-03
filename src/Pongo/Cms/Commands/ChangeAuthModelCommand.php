<?php namespace Pongo\Cms\Commands;

use File;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ChangeAuthModelCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'pongo:change_auth_model';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Change /app/config/auth.php default model';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$model_to_use = 'Pongo\Cms\Models\User';
		$file_to_open = app_path('config/auth.php');
		$file_to_edit = File::get($file_to_open);
		
		$file_content = str_replace("'User'", "'{$model_to_use}'", $file_to_edit);

		File::put($file_to_open, $file_content);

		$this->info('Auth parameter updated!');
		return;
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			// array('model', InputArgument::REQUIRED, 'Model to use'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
		// 	array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}