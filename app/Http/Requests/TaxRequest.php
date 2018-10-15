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
            'certificate_id' => 'required|numeric',

            // TAX BASE
            'folder_pbb' => 'nullable',
            'luas_sertifikat' => 'nullable',
            'rencana_group' => 'nullable',
            'pen_pbb' => 'nullable',
            
            'wajib_pajak' => 'nullable',
            'letak_objek_pajak' => 'nullable',
            'kelurahan_pbb' => 'nullable',
            'kota_pbb' => 'nullable',
            'nop' => 'nullable',
            'luas_tanah_pbb' => 'nullable',
            'luas_bangun_pbb' => 'nullable',
            'year' => 'nullable',
            // NJOP
            'njop_land' => 'nullable|numeric',
            'njop_building' => 'nullable|numeric',
            'njop_total' => 'nullable|numeric',
            'nominal_ly' => 'nullable|numeric',

            'due_date' => 'nullable|date',
            'due_date_ly' => 'nullable|date',
            'selisih' => 'nullable',

        ];
    }

    public function messages()
    {
        return [
            'certificate_id.required' => 'The certificate(s) field is required.'
        ];
    }

}
