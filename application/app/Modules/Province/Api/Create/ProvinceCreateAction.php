<?php

namespace App\Modules\Province\Api\Create;

use App\Http\Controllers\Controller;
use App\Modules\Province\Domain\Service\ProvinceCreate;
use Illuminate\Http\Request;

/**
 * ProvinceCreate action
 */
class ProvinceCreateAction extends Controller
{
    private $domain;
    private $responder;

    public function __construct(ProvinceCreate $domain, ProvinceCreateResponder $responder)
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
