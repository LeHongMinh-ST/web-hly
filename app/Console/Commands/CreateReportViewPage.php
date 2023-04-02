<?php

namespace App\Console\Commands;

use App\Models\ReportViewPage;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CreateReportViewPage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:view-page';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create report view page';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = Carbon::now()->startOfDay()->timestamp;

        ReportViewPage::firstOrCreate(['date' => $date]);

        return Command::SUCCESS;
    }
}
