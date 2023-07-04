<?php

namespace App\Services\User\Actions;

use App\Models\User;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Http;
use App\Resources\User\LoginResource;
use Illuminate\Auth\Access\AuthorizationException;
use App\Repositories\Read\User\UserReadRepositoryInterface;
use App\Repositories\Read\PassportClient\ClientReadRepositoryInterface;

class LoginAction
{
    private User $user;
    private array $data;
    private Client $oClient;

    public function __construct(
        public UserReadRepositoryInterface $userReadRepository,
        public ClientReadRepositoryInterface $clientReadRepository
    ) {}

    /**
     * @throws AuthorizationException
     */
    public function run(string $email, string $password): LoginResource
    {
        $this->getUser($email);

        $this->getPassportClientData();

        $this->getTokens($email, $password);

        return new LoginResource($this->data);
    }

    private function getUser(string $email): void
    {
        $this->user = $this->userReadRepository->getByUsername($email);
    }

    public function getPassportClientData(): void
    {
        $oClientId = env('PASSPORT_GRANT_CLIENT_ID');
        $this->oClient = $this->clientReadRepository->getById($oClientId);
    }

    public function getTokens(string $email, string $password)
    {
        $response =  Http::asForm()->post(env('APP_URL') . '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => $this->oClient->id,
            'client_secret' => $this->oClient->secret,
            'username' => $email,
            'password' => $password,
            'scope' => '*',
        ]);

        $this->data = json_decode($response->body(), true);
        $this->data['user'] = $this->user;

        if (array_key_exists('errors', $this->data)) {
            throw new AuthorizationException();
        }
    }
}
