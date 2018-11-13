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
            'certificate_ids' => 'required|numeric',

            // TAX BASE
            'folder_pbb' => 'nullable',
            'rencana_group' => 'nullable',
            'luas_sertifikat' => 'nullable',
            'pen_pbb' => 'nullable',
            
            'nop' => 'nullable',
            'wajib_pajak' => 'nullable',
            'letak_objek_pajak' => 'nullable',
            'kelurahan_pbb' => 'nullable',
            'kota_pbb' => 'nullable',
            'luas_tanah_pbb' => 'nullable',
            'luas_bangun_pbb' => 'nullable',
            'due_date' => 'nullable',
            // NJOP
            // 'year' => 'nullable',
            // 'njop_land' => 'nullable|numeric',
            // 'njop_building' => 'nullable|numeric',
            // 'njop_total' => 'nullable|numeric',
            // 'nominal_ly' => 'nullable|numeric',

            // 'due_date' => 'nullable|date',
            // 'due_date_ly' => 'nullable|date',
            // 'selisih' => 'nullable',

        ];
    }

    // public function messages()
    // {
    //     return [
    //         'certificate_id.required' => 'The certificate(s) field is required.'
    //     ];
    // }

}
