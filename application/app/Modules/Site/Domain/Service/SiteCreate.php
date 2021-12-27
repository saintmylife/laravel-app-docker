<?php

namespace App\Modules\Site\Domain\Service;

use App\Modules\Base\Domain\BaseService;
use App\Modules\Common\Domain\Payload;
use App\Modules\Site\Domain\SiteFilter;
use App\Modules\Site\Repository\SiteRepositoryInterface;
use App\Modules\Site\SiteDto;
use Illuminate\Support\Facades\Hash;
use App\Modules\Site\Site;
use Auth;

/**
 * SiteCreate domain
 */
class SiteCreate extends BaseService
{
    private $filter;
    private $SiteRepo;

    public function __construct(SiteFilter $filter, SiteRepositoryInterface $SiteRepo)
    {
        $this->filter = $filter;
        $this->SiteRepo = $SiteRepo;
    }

    public function __invoke(array $data): Payload
    {
        $user = Auth::user();
        $data['created_by'] = $user->id;
        $data['updated_by'] = $user->id;
        $data['status'] = 1;

        $SiteDto = $this->makeDto($data, new SiteDto);

        if (! $this->filter->forInsert($SiteDto)) {
            $messages = $this->filter->getMessages();
            return $this->newPayload(Payload::STATUS_NOT_VALID, compact('data', 'messages'));
        }

        $create = $this->SiteRepo->create($SiteDto->getData());
        
        return $this->newPayload(Payload::STATUS_CREATED, compact('create'));
    }
}
