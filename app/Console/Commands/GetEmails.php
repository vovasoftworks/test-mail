<?php

namespace App\Console\Commands;

use App\Jobs\GetEmailsJob;
use Illuminate\Console\Command;

class GetEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get emails';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        GetEmailsJob::dispatch();
    }
}
