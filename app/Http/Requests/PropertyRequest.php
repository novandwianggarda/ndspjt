<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'property_type_id' => 'required|numeric',
            'name' => 'nullable|string',
            'address' => 'nullable',
            'land_area' => 'nullable',
            'building_area' => 'nullable',
            'block' => 'nullable',
            'floor' => 'nullable',
            'unit' => 'nullable',
            'electricity' => 'nullable',
            'water' => 'nullable',
            'telephone' => 'nullable',
        ];
    }
}
