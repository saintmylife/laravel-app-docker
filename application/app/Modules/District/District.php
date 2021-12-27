<?php

namespace App\Modules\District;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $id;
    protected $name;
    protected $regency_id;
    protected $status;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'regency_id',
        'status',
    ];

    public function regency()
    {
        return $this->belongsTo('App\Modules\Regency\Regency', 'regency_id', 'id');
    }
}
