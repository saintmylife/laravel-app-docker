<?php

namespace App\Modules\Site\Domain;

use App\Modules\Base\BaseDto;
use App\Modules\Base\Domain\BaseFilter;
use Illuminate\Validation\Rule;

/**
 * Site filter
 */
class SiteFilter extends BaseFilter
{
    public function forUpdate(BaseDto $data): bool
    {
        $this->messages = [];
        $this->rules = [
            'title'         => 'nullable',
            'description'   => 'nullable',
            'age_category'  => 'nullable',
            'address'       => 'nullable',
            'province_id'   => 'nullable',
            'regency_id'    => 'nullable',
            'district_id'   => 'nullable',
            'village_id'    => 'nullable',
            'map_url'       => 'nullable',
            'thumbnail'     => 'nullable',
            'quota'         => 'nullable',
            'status'        => 'nullable',
            'owner'         => 'nullable',
            'created_by'    => 'nullable',
            'updated_by'    => 'nullable'
        ];
        return $this->basic($data);
    }

    protected function setBasicRule()
    {
        $this->rules = [
            'title'         => 'required',
            'description'   => 'required|min:5',
            'age_category'  => 'required',
            'address'       => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'district_id'   => 'required',
            'village_id'    => 'required',
            'map_url'       => 'nullable',
            'thumbnail'     => 'nullable',
            'quota'         => 'required',
            'status'        => 'required',
            'owner'         => 'nullable',
            'created_by'    => 'nullable',
            'updated_by'    => 'nullable'
        ];
    }
}
