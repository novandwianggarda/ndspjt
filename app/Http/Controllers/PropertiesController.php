<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\Http\Requests\PropertyRequest;

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
    //show properties
    public function show($id){
    	$property = Property::find($id);
    	return view('property.show')->with('property', $property);
    }
    //ini buat add nya :)
    public function store(PropertyRequest $request){
    	$data = $request->all();
    	$add = Property::create($data);
    	if (!$add){
    		return 'error';
    	}
    	return 'success';
    }
}
