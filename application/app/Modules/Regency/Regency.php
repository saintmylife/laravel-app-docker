<?php

namespace App\Modules\Regency;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    protected $id;
    protected $name;
    protected $province_id;
    protected $status;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'province_id',
        'status',
    ];

    public function province()
    {
        return $this->belongsTo('App\Modules\Province\Province', 'province_id', 'id');
    }
}
