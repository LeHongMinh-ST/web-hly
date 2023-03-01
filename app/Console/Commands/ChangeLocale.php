<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ChangeLocale extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'locale:change';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        config(['app.locale' => 'vi']);
        return Command::SUCCESS;
    }
}
