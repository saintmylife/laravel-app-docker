<?php

namespace App\Modules\Village\Repository;

use App\Modules\Village\Village;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * VillageRepository Eloquent
 */
class VillageRepositoryEloquent extends BaseRepository implements VillageRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $fieldSearchable = [
        'name'          => 'like',
        'district.name' => 'like'
    ];

    public function boot(){
        $this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    }

    public function model()
    {
        return Village::class;
    }
}
