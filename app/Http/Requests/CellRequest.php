<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CellRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'model' => 'required',
            'brand' => 'required|string',
            'capacity' => 'required|numeric',
            'wrap_color' => 'required',
            'ring_color' => 'required',
            'tested_capacity' => 'required|numeric',
            'resistance' => 'nullable|numeric',
            'discharge_current' => 'nullable|string',
            'price' => 'numeric|required',
            'note' => 'nullable|string',
        ];
    }
}
