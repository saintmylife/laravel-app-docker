<?php

namespace App\Modules\Site\Domain\Service;

use App\Modules\Base\Domain\BaseService;
use App\Modules\Common\Domain\Payload;
use App\Modules\Site\Repository\SiteRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Modules\Site\Site;
use App\Modules\Site\Domain\SiteFilter;
use App\Modules\Site\SiteDto;
use Auth;

/**
 * Site delete
 */
class SiteDelete extends BaseService
{
    private $SiteRepo;

    public function __construct(SiteRepositoryInterface $SiteRepo)
    {
        $this->SiteRepo = $SiteRepo;
    }

    public function __invoke(int $id): Payload
    {
        $user = Auth::user();
        $role = $user->roles[0]->name;
        try {
            $site = $this->SiteRepo->find($id);
            if ($role != 'super-admin' && $role != 'admin') {
                if ($site->user_id != $user->id) {
                    return $this->newPayload(Payload::STATUS_NOT_FOUND, compact('id'));
                }
            }
        } catch (ModelNotFoundException $e) {
            return $this->newPayload(Payload::STATUS_NOT_FOUND, compact('id'));
        }

        $data['status'] = 0;
        $update = $this->SiteRepo->update($data, $id);
        
        $message = 'Site deleted';
        return $this->newPayload(Payload::STATUS_DELETED, compact('message'));
    }
}
