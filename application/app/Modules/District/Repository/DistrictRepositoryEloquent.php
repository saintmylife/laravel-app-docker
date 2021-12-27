<?php

namespace App\Modules\District\Repository;

use App\Modules\District\District;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * DistrictRepository Eloquent
 */
class DistrictRepositoryEloquent extends BaseRepository implements DistrictRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $fieldSearchable = [
        'name'          => 'like',
        'regency.name' => 'like'
    ];

    public function boot(){
        $this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    }

    public function model()
    {
        return District::class;
    }
}
