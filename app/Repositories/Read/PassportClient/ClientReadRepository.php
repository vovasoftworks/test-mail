<?php

namespace App\Repositories\Read\PassportClient;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Passport\Client;

class ClientReadRepository implements ClientReadRepositoryInterface
{
    private function query(): Builder
    {
        return Client::query();
    }

    public function getById(int $id): Client
    {
        $client = $this->query()->where('id', $id)->first();

        if (is_null($client)) {
            throw new Exception('Client not found');
        }

        return $client;
    }
}
