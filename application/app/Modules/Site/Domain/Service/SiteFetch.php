<?php

namespace App\Modules\Site\Domain\Service;

use App\Modules\Base\Domain\BaseService;
use App\Modules\Common\Domain\Payload;
use App\Modules\Site\SiteDto;
use App\Modules\Site\Repository\SiteRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Auth;

/**
 * Site delete
 */
class SiteFetch extends BaseService
{
    private $SiteRepo;

    public function __construct(SiteRepositoryInterface $SiteRepo)
    {
        $this->SiteRepo = $SiteRepo;
    }

    public function __invoke(int $id): Payload
    {
        $user = Auth::user();
        
        try {
            $data = $this->SiteRepo->find($id);
            return $this->newPayload(Payload::STATUS_FOUND, compact('data'));
        } catch (ModelNotFoundException $e) {
            return $this->newPayload(Payload::STATUS_NOT_FOUND, compact('id'));
        }
    }
}
