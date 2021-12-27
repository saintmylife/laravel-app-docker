<?php

namespace App\Modules\Site;

use App\Modules\Base\BaseDto;

class SiteDto extends BaseDto
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
        $owner_id,
        $created_by,
        $updated_by;
}
