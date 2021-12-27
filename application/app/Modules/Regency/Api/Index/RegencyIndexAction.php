<?php

namespace App\Modules\Regency\Api\Index;

use App\Http\Controllers\Controller;
use App\Modules\Regency\Domain\Service\RegencyList;
use Illuminate\Http\Request;

/**
 * RegencyIndex action
 */
class RegencyIndexAction extends Controller
{
    private $domain;
    private $responder;

    public function __construct(RegencyList $domain, RegencyIndexResponder $responder)
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
