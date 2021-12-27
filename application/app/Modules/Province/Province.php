<?php

namespace App\Modules\Province;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $id;
    protected $name;
    protected $status;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
    ];
}
