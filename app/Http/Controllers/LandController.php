<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;


class LandController extends Controller
{
    public function index()
    {
    	$map = Certificate::all();

    	$boundaries = [];
    	foreach ($map as $mapss) {
    		$boundaries[] = $mapss->boundary_coordinates;
    	}
    	$boundaries = json_encode($boundaries);


        return view('land.maps', compact('map', 'boundaries', 'boundr'));
    }
}
