<?php

namespace App\Repositories\Read\User;

use App\Exceptions\UserNotFoundException;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Builder;

class UserReadRepository implements UserReadRepositoryInterface
{
    private function query(): Builder
    {
        return User::query();
    }

    public function getByUsername(string $email): User
    {
        $user = $this->query()->where('email', $email)->first();

        if (is_null($user)) {
            throw new Exception('User not found');
        }

        return $user;
    }
}
