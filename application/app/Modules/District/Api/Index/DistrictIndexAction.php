<?php

namespace App\Modules\District\Api\Index;

use App\Http\Controllers\Controller;
use App\Modules\District\Domain\Service\DistrictList;
use Illuminate\Http\Request;

/**
 * DistrictIndex action
 */
class DistrictIndexAction extends Controller
{
    private $domain;
    private $responder;

    public function __construct(DistrictList $domain, DistrictIndexResponder $responder)
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
