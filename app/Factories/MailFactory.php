<?php

namespace App\Factories;

use App\BusinessLogic\Mails\Gmail;
use App\BusinessLogic\Mails\MailRu;

class MailFactory extends Factory
{
    public function run($mailType): MailRu|Gmail
    {
        return match ($mailType->value) {
            'Gmail' => new Gmail(),
            'MailRu' => new MailRu()
        };
    }

}
