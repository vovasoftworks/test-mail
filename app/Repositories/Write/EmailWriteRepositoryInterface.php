<?php

namespace App\Repositories\Write;

interface EmailWriteRepositoryInterface
{
    public function insert(array $email): bool;
}
