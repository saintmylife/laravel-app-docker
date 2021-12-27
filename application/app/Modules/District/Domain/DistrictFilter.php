<?php

namespace App\Modules\District\Domain;

use App\Modules\Base\BaseDto;
use App\Modules\Base\Domain\BaseFilter;
use Illuminate\Validation\Rule;

/**
 * District filter
 */
class DistrictFilter extends BaseFilter
{
    public function forUpdate(BaseDto $data): bool
    {
        $this->messages = [];
        $this->setBasicRule();
        $this->rules = [
            'name'      => ['required', Rule::unique('district')->ignore($data->id)],
            'status'    => 'nullable'
        ];
        return $this->basic($data);
    }

    protected function setBasicRule()
    {
        $this->rules = [
            'name'          => 'required|unique:district,name',
            'status'   => 'nullable'
        ];
    }
}
