<?php

namespace App\Modules\Province\Domain\Service;

use App\Modules\Base\Domain\BaseService;
use App\Modules\Common\Domain\Payload;
use App\Modules\Province\Repository\ProvinceRepositoryInterface;

/**
 * Province list
 */
class ProvinceList extends BaseService
{
    private $provinceRepo;

    public function __construct(ProvinceRepositoryInterface $provinceRepo)
    {
        $this->provinceRepo = $provinceRepo;
    }

    public function __invoke($request)
    {
        $data = $this->provinceRepo->paginate(isset($request['per_page']) ? $request['per_page'] : 100);
        return $this->newPayload(Payload::STATUS_FOUND, compact('data'));
    }
}
