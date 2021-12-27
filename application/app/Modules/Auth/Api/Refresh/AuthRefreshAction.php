<?php

namespace App\Modules\Auth\Api\Refresh;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Domain\Service\AuthRefresh;
use Illuminate\Http\Request;

/**
 * AuthLogin action
 */
class AuthRefreshAction extends Controller
{
    private $domain;
    private $responder;

    public function __construct(AuthRefresh $domain, AuthRefreshResponder $responder)
    {
        $this->domain = $domain;
        $this->responder = $responder;
    }

    public function __invoke(Request $request)
    {
        $payload = $this->domain->__invoke($request->all());
        return $this->responder->__invoke($payload);
    }
}
