<?php

namespace App\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'access_token' => $this->resource['access_token'],
            'refresh_token' => $this->resource['refresh_token'],
            'token_type'   => $this->resource['token_type'],
            'expires_in'   => $this->resource['expires_in'],
            'user'         => $this->resource['user'] ?? null,
        ];
    }
}
