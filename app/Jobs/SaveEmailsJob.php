<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Repositories\Write\EmailWriteRepositoryInterface;

class SaveEmailsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        protected $emails
    ) {}

    public function __invoke(
        EmailWriteRepositoryInterface $emailWriteRepository
    ): void {
        $emailWriteRepository->insert($this->emails);
    }
}
