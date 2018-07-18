<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function __construct(Request $request)
    {
        if(!$request->ajax()){
            return response()->json(array(
                'code'      =>  401,
                'message'   =>  'Unauthorized'
            ), 401);
        }
    }
}
