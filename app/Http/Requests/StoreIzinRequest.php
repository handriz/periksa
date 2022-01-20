<?php

namespace App\Http\Requests;

use App\Models\Permission;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class StoreIzinRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:permissions',
            ],
        ];
    }
}
