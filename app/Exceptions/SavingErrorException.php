<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class SavingErrorException extends ApiException
{
    public function __construct()
    {
        parent::__construct("Could not save email", Response::HTTP_EXPECTATION_FAILED);
    }
}
