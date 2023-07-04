<?php

namespace App\Repositories\Read\User;

use App\Models\User;

interface UserReadRepositoryInterface
{
    public function getByUsername(string $email): User;
}
