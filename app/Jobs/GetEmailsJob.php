<?php

namespace App\Jobs;

use App\Factories\MailFactory;
use App\Services\Enums\MailType;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GetEmailsJob implements ShouldQueue
{
    use Dispatchable;

    public function handle(): void
    {
        $gmail = (new MailFactory())->run(MailType::GMAIL);
        $gmailMessages = $gmail->get();

        $mailRu = (new MailFactory())->run(MailType::MAILRU);
        $mailRuMessages = $mailRu->get();

        $messages = array_merge($gmailMessages, $mailRuMessages);

        SaveEmailsJob::dispatch($messages);
    }
}
