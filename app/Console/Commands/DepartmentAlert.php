<?php

namespace App\Console\Commands;

use App\Tickets;
use App\User;
use Illuminate\Console\Command;

class DepartmentAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alert:ticket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automate check if ticket unread';

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
        //
    }
}
