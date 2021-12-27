<?php

namespace App\Modules\Auth\Domain\Service;

use App\Modules\Auth\AuthDto;
use App\Modules\Auth\Domain\AuthFilter;
use App\Modules\Base\Domain\BaseService;
use App\Modules\Common\Domain\Payload;
use Illuminate\Support\Facades\Auth;

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

        if (! $this->filter->forLogin($authDto)) {
            $messages = $this->filter->getMessages();
            return $this->newPayload(Payload::STATUS_NOT_VALID, compact('messages', 'data'));
        }

        $token = Auth::attempt($data);
        if ($token === false) {
            $messages = 'Invalid Username or Password';
            return $this->newPayload(Payload::STATUS_AUTH_FAILED, compact('messages'));
        }

        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
            'expires_at' => date("d-m-Y h:i:s", strtotime("+" . Auth::factory()->getTTL() . "minutes"))
        ];

        return $this->newPayload(Payload::STATUS_AUTHENTICATED, compact('data'));
    }
}
