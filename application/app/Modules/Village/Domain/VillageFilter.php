<?php

namespace App\Modules\Village\Domain;

use App\Modules\Base\BaseDto;
use App\Modules\Base\Domain\BaseFilter;
use Illuminate\Validation\Rule;

/**
 * Village filter
 */
class VillageFilter extends BaseFilter
{
    public function forUpdate(BaseDto $data): bool
    {
        $this->messages = [];
        $this->setBasicRule();
        $this->rules = [
            'name'      => ['required', Rule::unique('village')->ignore($data->id)],
            'status'    => 'nullable'
        ];
        return $this->basic($data);
    }

    protected function setBasicRule()
    {
        $this->rules = [
            'name'          => 'required|unique:village,name',
            'status'   => 'nullable'
        ];
    }
}
