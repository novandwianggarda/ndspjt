<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PropertyType;

class PropertiesAjaxController extends Controller
{
    /**
     * get all lease types
     *
     * @return JSON
     */
    public function propertyTypes()
    {
        $propertyTypes = LeaseType::select('id', 'name')->get();
        return response()->json($propertyTypes);
    }
}
