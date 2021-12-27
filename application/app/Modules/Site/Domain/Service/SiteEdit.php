<?php

namespace App\Modules\Site\Domain\Service;

use App\Modules\Base\Domain\BaseService;
use App\Modules\Common\Domain\Payload;
use App\Modules\Site\Domain\SiteFilter;
use App\Modules\Site\Repository\SiteRepositoryInterface;
use App\Modules\Site\SiteDto;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Modules\Site\Site;
use Auth;
/**
 * SiteEdit service
 */
class SiteEdit extends BaseService
{
    private $filter;
    private $SiteRepo;

    public function __construct(SiteFilter $filter, SiteRepositoryInterface $SiteRepo)
    {
        $this->filter = $filter;
        $this->SiteRepo = $SiteRepo;
    }

    public function __invoke(int $id, array $data): Payload
    {
        $user = Auth::user();
        $role = $user->roles[0]->name;
        $data['updated_by'] = $user->id;
        
        $SiteDto = $this->makeDto($data, new SiteDto);

        try {
            $site = $this->SiteRepo->find($id);
            if ($role != 'super-admin' && $role != 'admin') {
                if ($site->owner != $user->id) {
                    return $this->newPayload(Payload::STATUS_NOT_FOUND, compact('id'));
                }
            }
        } catch (ModelNotFoundException $e) {
            return $this->newPayload(Payload::STATUS_NOT_FOUND, compact('id'));
        }

        $update = $this->SiteRepo->update(array_filter($SiteDto->getData()), $id);

        $data = $this->SiteRepo->find($id);
        return $this->newPayload(Payload::STATUS_UPDATED, compact('data'));
    }
}
