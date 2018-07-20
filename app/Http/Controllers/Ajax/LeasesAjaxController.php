<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LeaseType;

class LeasesAjaxController extends Controller
{
    /**
     * get all lease types
     *
     * @return JSON
     */
    public function leaseTypes()
    {
        $leaseTypes = LeaseType::select('id', 'name')->get();
        return response()->json($leaseTypes);
    }
}
