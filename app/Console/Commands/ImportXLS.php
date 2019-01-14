<?php

namespace App\Console\Commands;

use App\Imports\ElementsImport;
use Illuminate\Console\Command;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;




class ImportXLS extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'import';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Import data from .xlsx file';

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
	 * @return mixed
	 */
	public function handle()
	{
		if(Excel::import(new ElementsImport(), 'data.xlsx')){
			$this->info("Import successful!");
		}
	}
}
