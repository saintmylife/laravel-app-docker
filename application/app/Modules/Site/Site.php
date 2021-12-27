<?php

namespace App\Modules\Site;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $id,
        $title, 
        $description, 
        $age_category,
        $address,
        $province_id,
        $regency_id,
        $district_id,
        $village_id,
        $map_url,
        $thumbnail,
        $quota,
        $status,
        $owner,
        $created_by,
        $updated_by;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'age_category',
        'map_url',
        'thumbnail',
        'address',
        'province_id',
        'district_id',
        'regency_id',
        'village_id',
        'owner',
        'created_by',
        'updated_by',
        'quota',
        'status',
    ];

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'owner', 'id');
    }

    public function created_by()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function updated_by()
    {
        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }

    public function province()
    {
        return $this->belongsTo('App\Modules\Province\Province', 'province_id', 'id');
    }

    public function regency()
    {
        return $this->belongsTo('App\Modules\Regency\Regency', 'regency_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo('App\Modules\District\District', 'district_id', 'id');
    }

    public function village()
    {
        return $this->belongsTo('App\Modules\Village\Village', 'village_id', 'id');
    }
}
