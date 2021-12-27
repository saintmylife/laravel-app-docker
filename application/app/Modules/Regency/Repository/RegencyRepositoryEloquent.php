<?php

namespace App\Modules\Regency\Repository;

use App\Modules\Regency\Regency;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * RegencyRepository Eloquent
 */
class RegencyRepositoryEloquent extends BaseRepository implements RegencyRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $fieldSearchable = [
        'name'          => 'like',
        'province.name' => 'like'
    ];

    public function boot(){
        $this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    }

    public function model()
    {
        return Regency::class;
    }
}
