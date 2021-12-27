<?php

namespace App\Modules\Province\Api\Index;

use App\Http\Controllers\Controller;
use App\Modules\Province\Domain\Service\ProvinceList;
use Illuminate\Http\Request;

/**
 * ProvinceIndex action
 */
class ProvinceIndexAction extends Controller
{
    private $domain;
    private $responder;

    public function __construct(ProvinceList $domain, ProvinceIndexResponder $responder)
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
