<?php

namespace App\Modules\Auth\Domain\Service;

use App\Modules\Base\Domain\BaseService;
use App\Modules\Common\Domain\Payload;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;

/**
 * Auth logout service
 */
class AuthLogout extends BaseService
{
    public function __invoke(): Payload
    {
        $tokenId = auth()->user()->token()->id;

        $tokenRepository = app(TokenRepository::class);
        $refreshTokenRepository = app(RefreshTokenRepository::class);

        // Revoke an access token...
        $tokenRepository->revokeAccessToken($tokenId);

        // Revoke all of the token's refresh tokens...
        $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($tokenId);

        $message = 'Successfully logged out';
        return $this->newPayload(Payload::STATUS_LOGOUT, compact('message'));
    }
}
