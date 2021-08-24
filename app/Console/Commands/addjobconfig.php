<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class addjobconfig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:jobconfig';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add all the required job settings in the application';

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
     * @return int
     */
    public function handle()
    {
        $this->call('db:seed', [
            '--class' => 'JobQuestionSeeder'
        ]);
    
    }
}
