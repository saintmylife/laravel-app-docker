<?php

namespace App\Modules\Province\Repository;

use App\Modules\Province\Province;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * ProvinceRepository Eloquent
 */
class ProvinceRepositoryEloquent extends BaseRepository implements ProvinceRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $fieldSearchable = [
        'name'         => 'like',
    ];

    public function boot(){
        $this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    }

    public function model()
    {
        return Province::class;
    }
}
