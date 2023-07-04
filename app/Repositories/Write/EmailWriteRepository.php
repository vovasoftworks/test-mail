<?php

namespace App\Repositories\Write;

use App\Models\Email;
use Illuminate\Database\Eloquent\Builder;

class EmailWriteRepository implements EmailWriteRepositoryInterface
{
    public function insert(array $email): bool
    {
        return $this->query()
            ->insert($email);
    }

    public function query(): Builder
    {
        return Email::query();
    }
}
