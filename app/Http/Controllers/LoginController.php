<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Resources\User\LoginResource;
use App\Services\User\Actions\LoginAction;

class LoginController extends Controller
{
    public function __invoke(
        LoginRequest $request,
        LoginAction $loginAction
    ): LoginResource {
        return $loginAction->run($request->getEmail(), $request->getPassword());
    }
}
