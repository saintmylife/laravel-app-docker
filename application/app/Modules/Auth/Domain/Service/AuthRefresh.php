<?php

namespace App\Modules\Auth\Domain\Service;

use App\Modules\Auth\AuthDto;
use App\Modules\Auth\Domain\AuthFilter;
use App\Modules\Base\Domain\BaseService;
use App\Modules\Common\Domain\Payload;
use Illuminate\Support\Facades\Auth;
use JWTAuth;

/**
 * Auth profile
 */
class AuthRefresh extends BaseService
{
    public function __invoke(): Payload
    {
        try{
            $token = JWTAuth::getToken();
            if($token) {
                $token = JWTAuth::refresh($token);
                $data = [
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => Auth::factory()->getTTL() * 60,
                    'expires_at' => date("d-m-Y h:i:s", strtotime("+" . Auth::factory()->getTTL() . "minutes"))
                ];
            } else {
                $messages = 'Token not provided';

                return $this->newPayload(Payload::STATUS_AUTH_FAILED, compact('messages'));
            }
        }catch(TokenInvalidException $e){
            $messages = $e;

            return $this->newPayload(Payload::STATUS_AUTH_FAILED, compact('messages'));
        }

        return $this->newPayload(Payload::STATUS_AUTHENTICATED, compact('data'));
    }
}
