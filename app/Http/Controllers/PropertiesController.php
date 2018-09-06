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
            
            if (!empty($data) && $data->count()) {

                foreach ($data as $key => $value) {
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
                    \Session::flash('success','File imported succesfully ');
                }
            }
        }   
        return back();
    }

    // public function importFile(Request $request){

    //     if($request->hasFile('sample_file')){
    //         $path = $request->file('sample_file')->getRealPath();
    //         $data = \Excel::load($path)->get();
    //         if($data->count()){
    //             foreach ($data as $key => $value) {
    //                 $arr[] = ['title' => $value->title, 'body' => $value->body];
    //             }
    //             if(!empty($arr)){
    //                 DB::table('products')->insert($arr);
    //                 dd('Insert Recorded successfully.');
    //             }
    //         }

    //     }

    //     dd('Request data does not have any files to import.');      

    // } 


    // public function storeimport(Requests $request)
    // {
        
    //     $upload=$request->file('upload-file');
    //     $filePath=$upload->getRealPath();
       
    //     $file=fopen($filePath, 'r');
    //     $header= fgetcsv($file);
        
    //     $escapedHeader=[];
        
    //     foreach ($header as $key => $value){
    //         $lheader=strtolower($value);
    //         $escapedItem=preg_replace('/[^a-z]/', '', $lheader);
    //         array_push($escapedHeader, $escapedItem);
    //     }

        
    //     while ($columns=fgetcsv($file)) 
    //     {
    //         if($columns[0]=="")
    //         {
    //             continue;
    //         }

            
    //         foreach ($columns as $key => $value) {
    //             $value=preg_replace('/\D/', '',$value);
    //         }

    //         $data= array_combine($escapedHeader, $value);

    //         foreach ($data as $key => $value){
    //             $value=($key=="name" || $key=="month")?(integer)$value: (float)$value;
    //         }

            
    //         $name=$data['name'];
    //         $address=$data['address'];
    //         $land_area=$data['land_area'];
    //         $building_area=$data['building_area'];
    //         $block=$data['block'];
    //         $floor=$data['floor'];
    //         $unit=$data['unit'];
    //         $electricity=$data['electricity'];
    //         $water=$data['water'];
    //         $telephone=$data['telephone'];

    //         $properties= Property::firstOrNew(['name'=>$name]);
    //         $properties->address=$address;
    //         $properties->land_area=$land_area;
    //         $properties->building_area=$building_area;
    //         $properties->block=$block;
    //         $properties->floor=$floor;
    //         $properties->unit=$unit;
    //         $properties->electricity=$electricity;
    //         $properties->water=$water;
    //         $properties->telephone=$telephone;
    //         $properties->save();

    //     }
    // }


}
