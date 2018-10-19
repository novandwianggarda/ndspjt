<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;


class LandController extends Controller
{
    public function index()
    {
    	$map = Certificate::all();
        return view('land.maps', compact('map'));
    }
}
