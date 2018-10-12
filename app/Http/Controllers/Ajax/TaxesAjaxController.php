<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Ajax\AjaxController;
use Illuminate\Http\Request;
use App\CertificateType;
use App\Certificate;

class TaxesAjaxController extends AjaxController
{
    /**
     * get all certificates
     * that available for [new tax / new lease]
     *
     * @return json
     */
    public function availableCertificates(Request $request)
    {
        $for = $request->get('for');
        if ($for == 'tax') {
            $builder = Certificate::availableForTax();
        } 
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
        $ids = $request->get('ids'); // ex: 1,2,3
        if (empty($ids)) return '';

        $certificates = Certificate::whereIn('id', explode(',', $ids))->get();
        $result = (object)[];
        foreach ($certificates as $certificates) {
            @$result->no_hm_hgb .='|| ' . $certificates->no_hm_hgb. ' ';
            @$result->nama_sertifikat .='|| <span title="' .$certificates->keterangan. ' m2">'. $certificates->archive. ' </span> ';
            @$result->type .='|| ' . $certificates->certificate_type. ' ';
            @$result->kepemilikan .='|| ' . $certificates->kepemilikan. ' ';
            @$result->kota .='|| ' . $certificates->kota. ' ';
            @$result->addrees .='|| ' . $certificates->addrees. ' ';
            // @$result->area .='|| ' . $certificates->area. 'm<sup>2</sup> ';
            // @$result->total_area += $certificates->area;
        }
        // @$result->total_area = @$result->total_area . ' m<sup>2</sup>';
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
