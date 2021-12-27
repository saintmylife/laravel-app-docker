<?php

namespace App\Modules\District\Api\Create;

use App\Http\Controllers\Controller;
use App\Modules\District\Domain\Service\DistrictCreate;
use Illuminate\Http\Request;

/**
 * DistrictCreate action
 */
class DistrictCreateAction extends Controller
{
    private $domain;
    private $responder;

    public function __construct(DistrictCreate $domain, DistrictCreateResponder $responder)
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
