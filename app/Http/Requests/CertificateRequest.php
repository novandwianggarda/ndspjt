<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
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
            'certificate_type_id' => 'required|numeric',

            // CERTIFICATE BASE
            'number' => 'required|numeric',
            'name' => 'nullable',
            'nop' => 'nullable',
            'owner' => 'nullable',
            'area' => 'nullable|numeric',
            'published_date' => 'nullable|date',
            'expired_date' => 'nullable|date',
            'note' => 'nullable',

            // ADDRESS
            'addr_city' => 'nullable',
            'addr_district' => 'nullable',
            'addr_village' => 'nullable',
            'addr_address' => 'nullable|numeric',

            // AJB
            'ajb_nominal' => 'nullable|numeric',
            'addr_date' => 'nullable|date',

            // SCAN FILES
            'scan_certificate' => 'nullable',
            'scan_plotting' => 'nullable',
            'scan_land_siteplan' => 'nullable',
            'scan_krk' => 'nullable',
            'scan_imb' => 'nullable',

            // MAPS
            'map_coordinate' => 'nullable|json',
            'map_boundary' => 'nullable|json',
            'map_link' => 'nullable',

            // FOLDER FILLING
            'folder_number' => 'nullable',
            'folder_current' => 'nullable',
            'folder_plan' => 'nullable',
        ];
    }
}
