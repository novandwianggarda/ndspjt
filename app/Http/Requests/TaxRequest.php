<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaxRequest extends FormRequest
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
            'tax_type_id' => 'required|numeric',
            'certificate_ids' => 'required|unique:taxes',

            // TAX BASE
            'nop' => 'nullable',
            'owner' => 'nullable',
            'year' => 'nullable',
            'due_date' => 'nullable|date',
            'nominal_ly' => 'nullable|numeric',
            'due_date_ly' => 'nullable|date',
            'note' => 'nullable',

            // ADDRESS
            'addr_address' => 'nullable',
            'addr_village' => 'nullable',
            'addr_land_area' => 'nullable',
            'addr_building_area' => 'nullable',

            // NJOP
            'njop_land' => 'nullable|numeric',
            'njop_building' => 'nullable|numeric',
            'njop_total' => 'nullable|numeric',

            // CORPORATION
            'corp_name' => 'nullable',
            'corp_payment_method' => 'nullable',

            // FOLDER FILLING
            'folder_number' => 'nullable',
            'folder_current' => 'nullable',
            'folder_plan' => 'nullable',
        ];
    }
}
