<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandController extends Controller
{
    public function index()
    {
        return view('land.maps');
    }
}
