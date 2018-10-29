<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PropertyRequest;
use DB;
use App\Property;
use App\PropertyType;
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

    //ini edit data
    public function editprop($id)
    {
        $prop = Property::find($id);
        $proptype = PropertyType::all()->pluck('name', 'id');
        return view('property.edit', compact('prop', 'proptype'));
    }

    public function updateprop(Request $request, $id)
    {
        $prop = Property::find($id);
        $prop->name = $request->input('name');
        $prop->address = $request->input('address');
        $prop->land_area = $request->input('land_area');
        $prop->building_area = $request->input('building_area');
        $prop->block = $request->input('block');
        $prop->floor = $request->input('floor');
        $prop->unit = $request->input('unit');
        $prop->electricity = $request->input('electricity');
        $prop->water = $request->input('water');
        $prop->telephone = $request->input('telephone');

        $propUpdate = $request->only([
        'property_type_id', 'name', 'address',
        'land_area', 'building_area', 'floor', 'unit', 'electricity', 'water', 'telephone']);
        $prop->update($propUpdate);

        return redirect(url('dashboard'));
    }
    public function destroyprop($id)
    {
        $prop=Property::find($id);
        $prop->delete();
        return redirect()->route('properties');
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
        return redirect()->route('properties');
    }


    public function tes(Request $request)
    {
        // dd($request->all());
        $x = json_decode($request->data);
        foreach ($x as $d => $value) {
            $property_type = $value->property_type;

            if($property_type){

                $propTypeId = \App\PropertyType::where('name', $property_type)->get()->first()->id;
                
                $properties = new Property();
                $properties->property_type_id= $propTypeId;
                $properties->name= $value->name;
                $properties->address= $value->address;
                $properties->land_area= $value->land_area;
                $properties->block= $value->block;
                $properties->electricity= $value->electricity;
                $properties->water= $value->water;
                $properties->telephone= $value->telephone;
                $properties->save();
            }
        }
        return redirect()->route('properties');
    }



    public function eksport(){
        $prop = Property::all();
        return view('property.eksport')->with('prop', $prop);
    }

   public function eksported(){
        $prop_data = DB::table('properties')->get()->toArray();  
        $prop_array[] = array('Nama Lokasi', 'Type', 'Alamat', 'Luas Tanah', 'Luas Bangun', 'Block/Tower', 'Lantai', 'Unit', 'Listrik', 'Air', 'Telephone');

        foreach ($prop_data as $propert) 
        {
            $prop_array[] = array(
                'Nama Lokasi' => $propert->name,
                'Type' => \App\PropertyType::find($propert->property_type_id)->name,
                'Alamat' => $propert->address,
                'Luas Tanah' => $propert->land_area,
                'Luas Bangun' => $propert->building_area,
                'Block/Tower' => $propert->block,
                'Lantai' => $propert->floor,
                'Unit' => $propert->unit,
                'Listrik' => $propert->electricity,
                'Air' => $propert->water,
                'telephone' => $propert->telephone,
            );
        }


        Excel::create('Property', function($excel) use (
            $prop_array){
            $excel->setTitle('Property');
            $excel->sheet('Property', function($sheet)
                use($prop_array){
                    $sheet->fromArray($prop_array, null, 'A1', false, false);
                });
        })->download('xlsx');
    }



}
