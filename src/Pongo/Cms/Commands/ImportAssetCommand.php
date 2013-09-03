<?php namespace Pongo\Cms\Commands;

use File;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ImportAssetCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'pongo:import_asset';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Import assets from /public/local/app';

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
		$path_to_copy_from = public_path('dev/dist');
		$dirs_to_copy = File::directories($path_to_copy_from);
		$path_to_copy_into = base_path('workbench/pongocms/cms/public');

		foreach ($dirs_to_copy as $dir) {

			$dir_arr = explode('/', $dir);
			$dir_name = end($dir_arr);

			File::copyDirectory($dir, $path_to_copy_into . '/' . $dir_name); 

			$this->info($dir_name . ' copied!');
		}

		$this->info('Assets imported successfully!');
		// Calling asset:publish
		$this->call('asset:publish', array('--bench' => 'pongocms/cms'));
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
		// 	array('example', InputArgument::REQUIRED, 'An example argument.'),
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