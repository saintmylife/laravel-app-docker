<?php

namespace App\Modules\User\Domain;

use App\Modules\Base\BaseDto;
use App\Modules\Base\Domain\BaseFilter;
use Illuminate\Validation\Rule;

/**
 * User filter
 */
class UserFilter extends BaseFilter
{
    public function forUpdate(BaseDto $data): bool
    {
        $this->messages = [];
        $this->setBasicRule();
        $this->rules['password'] = 'nullable|min:5';
        $this->rules['email'] = [
            'required',
            Rule::unique('users')->ignore($data->id),
            'email'
        ];
        return $this->basic($data);
    }

    protected function setBasicRule()
    {
        $this->rules = [
            'name'      => 'required|min:5',
            'password'  => 'required|min:5',
            'email'     => 'required|unique:users,email',
        ];
    }
}
