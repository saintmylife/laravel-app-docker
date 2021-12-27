<?php

namespace App\Modules\Site\Api\Edit;

use App\Http\Controllers\Controller;
use App\Modules\Site\Domain\Service\SiteEdit;
use Illuminate\Http\Request;

/**
 * SiteEdit action
 */
class SiteEditAction extends Controller
{
    private $domain;
    private $responder;

    public function __construct(SiteEdit $domain, SiteEditResponder $responder)
    {
        $this->domain = $domain;
        $this->responder = $responder;
    }

    public function __invoke(Request $request, int $id)
    {
        $payload = $this->domain->__invoke($id, $request->all());
        return $this->responder->__invoke($payload);
    }
}
