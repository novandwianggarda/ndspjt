<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;


class LandController extends Controller
{
    public function index()
    {
    	$map = Certificate::find(1);

        return view('land.maps', compact('map'));
    }
}
