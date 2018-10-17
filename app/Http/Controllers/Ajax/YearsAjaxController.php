<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Ajax\AjaxController;
use Illuminate\Http\Request;
use App\CertificateType;
use App\Certificate;
use App\Tax;
use App\Year;

class YearsAjaxController extends AjaxController
{
    /**
     * get all certificates
     * that available for [new tax / new lease]
     *
     * @return json
     */
    public function availableYear(Request $request)
    {
        $for = $request->get('for');
        if ($for == 'certificate') {
            $builder = Certificate::availableForLease();
        } else if ($for == 'years') {
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
            @$result->nama_sertifikat .='|| ' . $certificates->nama_sertifikat. ' ';
            @$result->type .='|| ' . $certificates->certificate_type. ' '; 
            @$result->kepemilikan .='|| ' . $certificates->kepemilikan. ' '; 
            @$result->kecamatan .='|| ' . $certificates->kecamatan. ' '; 
        }
        return response()->json($result);
    }







//avalable year-tax

    public function availableYearpbb(Request $request)
    {
        $for = $request->get('for');
        if ($for == 'tax') {
            $builder = Tax::availableForYear();
        } else if ($for == 'years') {
            $builder = Tax::availableForLease();
        }
        $taxes = $builder->select('id', 'nop', 'pen_pbb')->get();
        return response()->json($taxes);
    }

    /**
     * get result certificate
     *
     * @return json
     */
    public function resultpbb(Request $request)
    {
        $ids = $request->get('id'); // ex: 1,2,3
        if (empty($ids)) return '';

        $taxes = Tax::whereIn('id', explode(',', $ids))->get();
        $result = (object)[];
        foreach ($taxes as $taxes) {

            @$result->nop .='|| ' . $taxes->nop. ' ';
            @$result->letak_objek_pajak .='|| ' . $taxes->letak_objek_pajak. ' ';
            @$result->luas_sertifikat .='|| ' . $taxes->luas_sertifikat. ' ';
            @$result->njop_land .='|| ' . $taxes->njop_land. ' ';
            @$result->njop_building .='|| ' . $taxes->njop_building. ' ';
        }
        return response()->json($result);
    }
}
