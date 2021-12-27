<?php

namespace App\Modules\District\Domain\Service;

use App\Modules\Base\Domain\BaseService;
use App\Modules\Common\Domain\Payload;
use App\Modules\District\Repository\DistrictRepositoryInterface;

/**
 * District list
 */
class DistrictList extends BaseService
{
    private $districtRepo;

    public function __construct(DistrictRepositoryInterface $districtRepo)
    {
        $this->districtRepo = $districtRepo;
    }

    public function __invoke($request)
    {
        $data = $this->districtRepo->paginate(isset($request['per_page']) ? $request['per_page'] : 100);
        return $this->newPayload(Payload::STATUS_FOUND, compact('data'));
    }
}
