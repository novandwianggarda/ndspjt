<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\AjaxController;
use Illuminate\Http\Request;

/**
 * use for unrelated things
 */
class GlobalAjaxController extends AjaxController
{
    /**
     * get difference between two dates
     * in monthly or yearly
     */
    public function diffTwoDates(Request $request)
    {
        $startDate = $request->get('start');
        $endDate = $request->get('end');
        $period = $request->get('period');

        if (empty($startDate) && empty($endDate)){
            return response()->json(['error' => 'invalid date.']);
        }

        return response()->json([
            'difference' => diffTwoDates($startDate, $endDate, $period)
        ]);
    }
}
