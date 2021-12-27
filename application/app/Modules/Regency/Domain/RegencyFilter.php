<?php

namespace App\Modules\Regency\Domain;

use App\Modules\Base\BaseDto;
use App\Modules\Base\Domain\BaseFilter;
use Illuminate\Validation\Rule;

/**
 * Regency filter
 */
class RegencyFilter extends BaseFilter
{
    public function forUpdate(BaseDto $data): bool
    {
        $this->messages = [];
        $this->setBasicRule();
        $this->rules = [
            'name'      => ['required', Rule::unique('regency')->ignore($data->id)],
            'status'    => 'nullable'
        ];
        return $this->basic($data);
    }

    protected function setBasicRule()
    {
        $this->rules = [
            'name'          => 'required|unique:regency,name',
            'status'   => 'nullable'
        ];
    }
}
