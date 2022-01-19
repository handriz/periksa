<?php

namespace App\Http\Requests;

use App\Models\izin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class StoreIzinRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nama_izin' => [
                'string',
                'required',
                'unique:izins',
            ],
        ];
    }
}
