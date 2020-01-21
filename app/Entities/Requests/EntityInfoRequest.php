<?php

namespace App\Entities\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntityInfoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'entity_name' => 'required',
        ];
    }
}