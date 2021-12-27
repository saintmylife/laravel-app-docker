<?php

namespace App\Modules\Site\Domain\Service;

use App\Modules\Base\Domain\BaseService;
use App\Modules\Common\Domain\Payload;
use App\Modules\Site\Repository\SiteRepositoryInterface;
use Auth;

/**
 * SiteList service
 */
class SiteList extends BaseService
{
    private $SiteRepo;

    public function __construct(SiteRepositoryInterface $SiteRepo)
    {
        $this->SiteRepo = $SiteRepo;
    }

    public function __invoke($request)
    {
        $user = Auth::user();
        $role = $user->roles[0]->name;
        $status = isset($request['status']) ? 'status = ' . $request['status'] : '';
        $filter = $status;

        $data = $this->SiteRepo;
        if($filter){
            $data = $data->whereRaw($filter);
        }
        
        $data = $data->paginate(isset($request['per_page']) ? $request['per_page'] : 100);

        return $this->newPayload(Payload::STATUS_FOUND, compact('data'));
    }
}
