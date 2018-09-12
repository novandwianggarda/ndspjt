<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PropertyRequest;
use App\Property;
use Maatwebsite\Excel\Facades\Excel;


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


    // import properti
    public function import(){
        return view('property.upload');
    }

    public function storeimport(Request $request){
        //dd($request->all());
        if ($request->hasFile('upload-file')){

            $path = $request->file('upload-file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();

            return view('property.showdata')->with('data', $data);
        }
        return back();
    }



    public function tes(Request $request)
    {
        // $x = json_decode($request->data);
        // foreach ($x as $d) {
        //     echo $d->property_type;
        // }
        $x = json_decode($request->data);
        foreach ($x as $d => $value) {
            $propertyTypeId = \App\PropertyType::where('name', strtolower($value->property_type))->first()->id;
            $properties = new Property();
            $properties->property_type_id= $propertyTypeId;
            $properties->name= $value->name;
            $properties->address= $value->address;
            $properties->land_area= $value->land_area;
            $properties->building_area= $value->building_area;
            $properties->block= $value->block;
            $properties->floor= $value->floor;
            $properties->unit= $value->unit;
            $properties->electricity= $value->electricity;
            $properties->water= $value->water;
            $properties->telephone= $value->telephone;
            $properties->save();
        }
        return redirect()->route('dashboard');

    }


}
