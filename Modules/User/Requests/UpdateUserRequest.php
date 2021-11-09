<?php

namespace Modules\User\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            Str::snake('unverifiedPhone') => $this->unverifiedPhone,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'unverified_phone' => 'digits:11|nullable',
            'name' => 'string|nullable',
            'email' => 'email|nullable',
            'subscribed' => 'boolean|nullable',
        ];
    }
}
