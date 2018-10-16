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
            @$result->nama_sertifikat .='|| <span title="' .$certificates->keterangan. ' m2">'. $certificates->nama_sertifikat. ' </span> ';
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
            @$result->pen_pbb .='|| <span title="' .$taxes->kota_pbb. ' m2">'. $taxes->pen_pbb. ' </span> ';
            @$result->letak_objek_pajak .='|| ' . $taxes->letak_objek_pajak. ' ';
        }
        return response()->json($result);
    }
}
