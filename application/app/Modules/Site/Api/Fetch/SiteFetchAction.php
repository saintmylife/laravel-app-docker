<?php

namespace App\Modules\Site\Api\Fetch;

use App\Http\Controllers\Controller;
use App\Modules\Site\Domain\Service\SiteFetch;
use Illuminate\Http\Request;

/**
 * SiteFetch action
 */
class SiteFetchAction extends Controller
{
    private $domain;
    private $responder;

    public function __construct(SiteFetch $domain, SiteFetchResponder $responder)
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
