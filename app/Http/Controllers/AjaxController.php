<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;

class AjaxController extends Controller
{
    /**
     * THIS STILL UGLY AS HELL
     * WILL FIX IT LATER
     */

    /**
     * all thing about certificate
     */
    public function certificate(Request $request)
    {
        $action = $request->input('act');
        $html = '';

        switch ($action) {

            case 'select-options':

                $certs = Certificate::select('id', 'number', 'name')->get();
                foreach ($certs as $cert) {
                    $html .= '<option value="' .$cert->id. '">' .$cert->number. ' - ' .$cert->name. '</option>';
                }
                return $html;

                break;

            case 'cert-result':

                $certIds = $request->get('ids'); // ex: 1,2,3
                if (empty($certIds)) return '';
                $certs = Certificate::whereIn('id', explode(',', $certIds))->get();
                $certRes = (object)[];
                foreach ($certs as $cert) {
                    @$certRes->number .='|| ' . $cert->number. ' ';
                    @$certRes->name .='|| <span title="' .$cert->area. ' m2">'. $cert->name. ' </span> ';
                    @$certRes->type .='|| ' . $cert->cert_type. ' ';
                    @$certRes->owner .='|| ' . $cert->owner. ' ';
                    @$certRes->city .='|| ' . $cert->addr_city. ' ';
                    @$certRes->village .='|| ' . $cert->addr_village. ' ';
                    @$certRes->area .='|| ' . $cert->area. 'm<sup>2</sup> ';
                    @$certRes->totalArea += $cert->area;
                }
                $html .= '
                    <dl class="dl-horizontal">
                        <dt class="text-muted">Number</dt>
                        <dd>' .$certRes->number. '</dd>
                        <dt class="text-muted">Name</dt>
                        <dd>' .$certRes->name. '</dd>
                        <dt class="text-muted">Type</dt>
                        <dd>' .$certRes->type. '</dd>
                        <dt class="text-muted">Owner</dt>
                        <dd>' .$certRes->owner. '</dd>
                        <dt class="text-muted">City</dt>
                        <dd>' .$certRes->city. '</dd>
                        <dt class="text-muted">Village</dt>
                        <dd>' .$certRes->village. '</dd>
                        <dt class="text-muted">Area</dt>
                        <dd>' .$certRes->area. '</dd>
                        <dt class="text-muted">Total Area</dt>
                        <dd>' .$certRes->totalArea. ' m<sup>2</sup></dd>
                    </dl>
                ';
                return $html;

                break;

            default:

                return response()->json([ 'error' => 'No Action.']);

                break;
        }
    }
}
