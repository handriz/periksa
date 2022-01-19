<?php

namespace App\Http\Requests;

use App\Models\Izin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateIzinRequest extends FormRequest
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
