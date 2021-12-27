<?php

namespace App\Modules\Site\Repository;

use App\Modules\Site\Site;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * SiteRepository Eloquent
 */
class SiteRepositoryEloquent extends BaseRepository implements SiteRepositoryInterface
{

    protected $fieldSearchable = [
        'title'         => 'like',
        'description'   => 'like',
        'address'       => 'like',
        'province.name' => 'like',
        // 'regency.name'  => 'like',
        // 'district.name' => 'like',
        // 'village.name'  => 'like'
    ];

    public function boot(){
        $this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    }

    /**
     * Specify Model site name
     *
     * @return string
     */
    public function model()
    {
        return Site::class;
    }
}
