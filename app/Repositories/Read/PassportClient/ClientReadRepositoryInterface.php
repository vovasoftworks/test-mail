<?php

namespace App\Repositories\Read\PassportClient;

use Laravel\Passport\Client;

interface ClientReadRepositoryInterface
{
    public function getById(int $id): Client;
}
