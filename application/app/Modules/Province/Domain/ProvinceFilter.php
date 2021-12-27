<?php

namespace App\Modules\Province\Domain;

use App\Modules\Base\BaseDto;
use App\Modules\Base\Domain\BaseFilter;
use Illuminate\Validation\Rule;

/**
 * Province filter
 */
class ProvinceFilter extends BaseFilter
{
    public function forUpdate(BaseDto $data): bool
    {
        $this->messages = [];
        $this->setBasicRule();
        $this->rules = [
            'name'      => ['required', Rule::unique('province')->ignore($data->id)],
            'status'    => 'nullable'
        ];
        return $this->basic($data);
    }

    protected function setBasicRule()
    {
        $this->rules = [
            'name'          => 'required|unique:province,name',
            'status'   => 'nullable'
        ];
    }
}
