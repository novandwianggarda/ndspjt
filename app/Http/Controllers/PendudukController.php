<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PropertyRequest;
use DB;
use App\Penduduk;
use App\PropertyType;
use Maatwebsite\Excel\Facades\Excel;


class PendudukController extends Controller
{
    //show add properti
    public function showAddForm(){
    	return view('penduduk.add');
    }

    //show all properti as a table
    public function index(){
    	$penduduks = Penduduk::all();
    	return view('penduduk.table')->with('penduduks', $penduduks);
    }
    //show properties
    public function show($id){
    	$property = Penduduk::find($id);
    	return view('penduduk.show')->with('property', $property);
    }
    //ini buat add nya :)
    public function store(PropertyRequest $request){
    	$data = $request->all();
    	$add = Penduduk::create($data);
    	if (!$add){
    		return 'error';
    	}
    	return 'success';
    }

    //ini edit data
    public function editprop($id)
    {
        $pend = Penduduk::find($id);
        return view('penduduk.edit', compact('pend'));
    }

    public function updateprop(Request $request, $id)
    {
        $prop = Penduduk::find($id);
        $prop->nokk = $request->input('nokk');
        $prop->nik = $request->input('nik');
        $prop->nama = $request->input('nama');
        $prop->ttl = $request->input('ttl');
        $prop->tgl = $request->input('tgl');
        $prop->statusper = $request->input('statusper');
        $prop->jkl = $request->input('jkl');
        $prop->jl = $request->input('jl');
        $prop->rt = $request->input('rt');
        $prop->rw = $request->input('rw');
        $prop->disabi = $request->input('disabi');
        $prop->ket = $request->input('ket');

        $propUpdate = $request->only([
        'property_type_id', 'nama', 'address',
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
        return view('penduduk.upload');
    }

    public function storeimport(Request $request){
        //dd($request->all());
        if ($request->hasFile('upload-file')){

            $path = $request->file('upload-file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();

            return view('penduduk.showdata')->with('data', $data);
        }
        return redirect()->route('penduduk');
    }


    public function tes(Request $request)
    {
        // dd($request->all());
        $x = json_decode($request->data);
        foreach ($x as $d => $value) {
            $pend = new Penduduk();
            $pend->nokk= $value->nokk;
            $pend->nik= $value->nik;
            $pend->nama= $value->nama;
            $pend->ttl= $value->ttl;
            $pend->tgl= $value->tgl;
            $pend->statusper= $value->statusper;
            $pend->jkl= $value->jkl;
            $pend->jl= $value->jl;
            $pend->rt= $value->rt;
            $pend->rw= $value->rw;
            $pend->disabi= $value->disabi;
            $pend->ket= $value->ket;
            $pend->save();
        }
        return redirect()->route('penduduk');
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
