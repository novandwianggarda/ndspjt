<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\AjaxController;
use Illuminate\Http\Request;
use App\Certificate;
use App\CertificateType;

class CertificatesAjaxController extends AjaxController
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
        } else if ($for == 'lease') {
            $builder = Certificate::availableForLease();
        }

        $certificates = $builder->select('id', 'name', 'number')->get();
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
            @$result->number .='|| ' . $certificates->number. ' ';
            @$result->name .='|| <span title="' .$certificates->area. ' m2">'. $certificates->name. ' </span> ';
            @$result->type .='|| ' . $certificates->certificate_type. ' ';
            @$result->owner .='|| ' . $certificates->owner. ' ';
            @$result->city .='|| ' . $certificates->addr_city. ' ';
            @$result->village .='|| ' . $certificates->addr_village. ' ';
            @$result->area .='|| ' . $certificates->area. 'm<sup>2</sup> ';
            @$result->total_area += $certificates->area;
        }
        @$result->total_area = @$result->total_area . ' m<sup>2</sup>';
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
