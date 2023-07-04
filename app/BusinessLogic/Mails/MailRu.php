<?php

namespace App\BusinessLogic\Mails;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\BusinessLogic\Interface\MailInterface;

class MailRu implements MailInterface
{
    public function get(): array
    {
        return [
            [
                'domain_name' => Str::random(10),
                'name' => Str::random(10),
                'text' => Str::random(255),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'domain_name' => Str::random(10),
                'name' => Str::random(10),
                'text' => Str::random(255),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
    }

}
