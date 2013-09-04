<?php namespace Pongo\Cms\Commands;

use File;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CreateMigrationCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'pongo:create_migration';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a workbench migration';

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
		$action_name = $this->argument('action_name');
		$str_arr = explode('_', $action_name);
		$table_name = end($str_arr);
		
		// Calling asset:publish
		$this->call('migrate:make', array(
			'name' =>  $action_name,
			'--bench' => 'pongocms/cms',
			'--table' => $table_name,
			'--create' => null
		));

		$this->info('Migration for table "' . $table_name . '" created successfully!');
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
			array('action_name', InputArgument::REQUIRED, 'Migration name to create'),
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