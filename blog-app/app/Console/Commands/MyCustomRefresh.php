<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;

class MyCustomRefresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:custom-refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'single command to execute optimize,config,cache,route clear command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('optimize');
        $this->info('');
        $this->info('Command run successfully');
        $this->info('');
    }
}
