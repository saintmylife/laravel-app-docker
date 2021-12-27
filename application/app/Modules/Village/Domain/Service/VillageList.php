<?php

namespace App\Modules\Village\Domain\Service;

use App\Modules\Base\Domain\BaseService;
use App\Modules\Common\Domain\Payload;
use App\Modules\Village\Repository\VillageRepositoryInterface;

/**
 * Village list
 */
class VillageList extends BaseService
{
    private $villageRepo;

    public function __construct(VillageRepositoryInterface $villageRepo)
    {
        $this->villageRepo = $villageRepo;
    }

    public function __invoke($request)
    {
        $data = $this->villageRepo->paginate(isset($request['per_page']) ? $request['per_page'] : 100);
        return $this->newPayload(Payload::STATUS_FOUND, compact('data'));
    }
}
