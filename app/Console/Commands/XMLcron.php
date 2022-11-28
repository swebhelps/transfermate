<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\CreateBoe\DashboardController;

class XMLcron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
   // protected $signature = 'demo:XMLcron';
   protected $signature = 'command:XMLcron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        \Log::info("Cron is working fine!");
        DashboardController::storeXMLReadData();
    }

}
