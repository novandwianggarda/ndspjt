<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    //show add properti
    public function showAddForm(){
    	return view('property.add');
    }
}
