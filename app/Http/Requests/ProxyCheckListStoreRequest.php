<?php

namespace App\Http\Requests;

use App\Rules\ProxyListRule;
use Illuminate\Foundation\Http\FormRequest;

class ProxyCheckListStoreRequest extends FormRequest
{
    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'proxy_list' => ['required', 'string', new ProxyListRule()],
        ];
    }
}
