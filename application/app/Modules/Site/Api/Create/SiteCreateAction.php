<?php

namespace App\Modules\Site\Api\Create;

use App\Http\Controllers\Controller;
use App\Modules\Site\Domain\Service\SiteCreate;
use Illuminate\Http\Request;

/**
 * SiteCreate action
 */
class SiteCreateAction extends Controller
{
    private $domain;
    private $responder;

    public function __construct(SiteCreate $domain, SiteCreateResponder $responder)
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
