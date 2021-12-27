<?php

namespace App\Modules\Regency\Domain\Service;

use App\Modules\Base\Domain\BaseService;
use App\Modules\Common\Domain\Payload;
use App\Modules\Regency\Repository\RegencyRepositoryInterface;

/**
 * Regency list
 */
class RegencyList extends BaseService
{
    private $regencyRepo;

    public function __construct(RegencyRepositoryInterface $regencyRepo)
    {
        $this->regencyRepo = $regencyRepo;
    }

    public function __invoke($request)
    {
        $data = $this->regencyRepo->paginate(isset($request['per_page']) ? $request['per_page'] : 100);
        return $this->newPayload(Payload::STATUS_FOUND, compact('data'));
    }
}
