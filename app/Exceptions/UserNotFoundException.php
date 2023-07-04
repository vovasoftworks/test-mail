<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class UserNotFoundException extends ApiException
{
    public function __construct()
    {
        parent::__construct("User has not been found", Response::HTTP_NOT_FOUND);
    }
}
