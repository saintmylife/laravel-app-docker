<?php

namespace App\Modules\Site\Api\Delete;

use App\Http\Controllers\Controller;
use App\Modules\Site\Domain\Service\SiteDelete;

/**
 * SiteDelete action
 */
class SiteDeleteAction extends Controller
{
    private $domain;
    private $responder;

    public function __construct(SiteDelete $domain, SiteDeleteResponder $responder)
    {
        $this->domain = $domain;
        $this->responder = $responder;
    }

    public function __invoke(int $id)
    {
        $payload = $this->domain->__invoke($id);
        return $this->responder->__invoke($payload);
    }
}
