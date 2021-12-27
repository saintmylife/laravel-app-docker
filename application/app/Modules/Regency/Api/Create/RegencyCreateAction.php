<?php

namespace App\Modules\Regency\Api\Create;

use App\Http\Controllers\Controller;
use App\Modules\Regency\Domain\Service\RegencyCreate;
use Illuminate\Http\Request;

/**
 * RegencyCreate action
 */
class RegencyCreateAction extends Controller
{
    private $domain;
    private $responder;

    public function __construct(RegencyCreate $domain, RegencyCreateResponder $responder)
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
