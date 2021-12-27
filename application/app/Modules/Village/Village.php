<?php

namespace App\Modules\Village;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $id;
    protected $name;
    protected $district_id;
    protected $status;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'district_id',
        'status',
    ];

    public function district()
    {
        return $this->belongsTo('App\Modules\District\District', 'district_id', 'id');
    }
}
