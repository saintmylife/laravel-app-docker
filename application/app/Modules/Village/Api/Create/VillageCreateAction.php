<?php

namespace App\Modules\Village\Api\Create;

use App\Http\Controllers\Controller;
use App\Modules\Village\Domain\Service\VillageCreate;
use Illuminate\Http\Request;

/**
 * VillageCreate action
 */
class VillageCreateAction extends Controller
{
    private $domain;
    private $responder;

    public function __construct(VillageCreate $domain, VillageCreateResponder $responder)
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
