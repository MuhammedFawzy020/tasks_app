<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup the application (install dependencies, migrate, seed, and start server)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //$this->call('composer', ['install']);
        $this->call('migrate');
        $this->call('db:seed');
        $this->call('serve');

        return Command::SUCCESS;
    }
}