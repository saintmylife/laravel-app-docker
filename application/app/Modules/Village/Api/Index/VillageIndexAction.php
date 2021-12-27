<?php

namespace App\Modules\Village\Api\Index;

use App\Http\Controllers\Controller;
use App\Modules\Village\Domain\Service\VillageList;
use Illuminate\Http\Request;

/**
 * VillageIndex action
 */
class VillageIndexAction extends Controller
{
    private $domain;
    private $responder;

    public function __construct(VillageList $domain, VillageIndexResponder $responder)
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
