<?php

namespace App\Modules\Auth\Domain\Service;

use App\Modules\Auth\AuthDto;
use App\Modules\Auth\Domain\AuthFilter;
use App\Modules\Base\Domain\BaseService;
use App\Modules\Common\Domain\Payload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

/**
 * AuthLogin service
 */
class AuthLogin extends BaseService
{
    private $filter;

    public function __construct(AuthFilter $filter)
    {
        $this->filter = $filter;
    }

    public function __invoke(array $data): Payload
    {
        $authDto = $this->makeDto($data, new AuthDto);

        if (!$this->filter->forLogin($authDto)) {
            $messages = $this->filter->getMessages();
            return $this->newPayload(Payload::STATUS_NOT_VALID, compact('messages', 'data'));
        }

        try {
            $auth = Http::asForm()->post(
                '172.27.1.3/oauth/token',
                [
                    'grant_type' => 'password',
                    'client_id' => config('passport.personal_access_client.id'),
                    'client_secret' => config('passport.personal_access_client.secret'),
                    'username' => $authDto->email,
                    'password' =>  $authDto->password,
                    'scope' => '',
                ]
            )->throw()->json();
        } catch (\Exception) {
            $messages = 'Credential is not valid';
            return $this->newPayload(Payload::STATUS_AUTH_FAILED, compact('messages', 'data'));
        }

        $data = [
            'access_token' => $auth['access_token'],
            'refresh_token' => $auth['refresh_token'],
            'token_type' => 'bearer',
            'expires_in' => $auth['expires_in'],
            'expires_at' => date("d-m-Y h:i:s", strtotime("+" . $auth['expires_in'] . "minutes"))
        ];

        return $this->newPayload(Payload::STATUS_AUTHENTICATED, compact('data'));
    }
}
