<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class PropertiesController extends Controller
{
    //show add properti
    public function showAddForm(){
    	return view('property.add');
    }

    //show all properti as a table
    public function index(){
    	$properties = Property::all();
    	return view('property.table')->with('properties', $properties);
    }
    
}
