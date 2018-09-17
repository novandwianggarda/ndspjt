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
            // 'number' => 'required|numeric',
            'folder_sert' => 'nullable',
            'no_folder' => 'nullable',
            'number_hgb' => 'nullable',

            'kepemilikan' => 'nullable',
            'nama_sertifikat' => 'nullable',
            'folder_sert' => 'nullable',
            'keterangan' => 'nullable',
            'archive' => 'nullable',
            'kelurahan' => 'nullable',
            'kecamatan' => 'nullable',
            'kota' => 'nullable',
            'published_date' => 'nullable|date',
            'expired_date' => 'nullable|date',
            'luas_sertifikat' => 'nullable',
            'addrees' => 'nullable', 
            'ajb_nominal' => 'nullable',
            'ajb_date' => 'nullable|date',
            'map_coordinate' => 'nullable|json',
            'penanggung_pbb' => 'nullable',
            'wajib_pajak' => 'nullable',
            'letak_objek_pajak' => 'nullable',
            'kelurahan_pbb' => 'nullable',
            'kota_pbb' => 'nullable',
            'nop' => 'nullable',

            'purposes' => 'nullable',
            'no_hm_hgb' => 'nullable',

            'luas_tanah_pbb' => 'nullable',
            'luas_bangun_pbb' => 'nullable',
        ];
    }
}
