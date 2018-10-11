<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Ajax\AjaxController;
use Illuminate\Http\Request;
use App\CertificateType;
use App\Certificate;

class PbbAjaxController extends AjaxController
{
    /**
     * get all certificates
     * that available for [new tax / new lease]
     *
     * @return json
     */
    public function availableTaxes(Request $request)
    {

        $certificates = $builder->select('id', 'nama_sertifikat', 'no_hm_hgb')->get();
        return response()->json($certificates);
    }

    /**
     * get result certificate
     *
     * @return json
     */
    public function result(Request $request)
    {
        $idsert = $request->get('ids'); // ex: 1,2,3
        if (empty($ids)) return '';

        $certificates = Certificate::whereIn('id', explode(',', $idsert))->get();
        $result = (object)[];
        foreach ($certificates as $certificates) {
            @$result->no_hm_hgb .='|| ' . $certificates->no_hm_hgb. ' ';
            @$result->nama_sertifikat .='|| <span title="' .$certificates->keterangan. ' m2">'. $certificates->purposes. ' </span> ';
        }
        return response()->json($result);
    }

    /**
     * get all certificate types
     *
     * @return JSON
     */
    public function certificateTypes()
    {
        $certificateTypes = CertificateType::select('id', 'short_name', 'long_name')->get();
        return response()->json($certificateTypes);
    }
}
