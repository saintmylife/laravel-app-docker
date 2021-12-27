<?php

namespace App\Modules\Site\Api\Index;

use App\Http\Controllers\Controller;
use App\Modules\Site\Domain\Service\SiteList;
use Illuminate\Http\Request;

/**
 * SiteIndex action
 */
class SiteIndexAction extends Controller
{
    private $domain;
    private $responder;

    public function __construct(SiteList $domain, SiteIndexResponder $responder)
    {
        $this->domain = $domain;
        $this->responder = $responder;
    }


    function __invoke(Request $request)
    {
        $payload = $this->domain->__invoke($request->all());
        return $this->responder->__invoke($payload);
    }
}
