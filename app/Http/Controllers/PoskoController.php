<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PropertyRequest;
use App\Http\Requests\poskoRequest;
use DB;
use App\Penduduk;
use App\Posko;
use Maatwebsite\Excel\Facades\Excel;


class PoskoController extends Controller
{
    //show add properti
    public function showAddForm(){
    	return view('posko.add');
    }

    //show all posko as a table
    public function index(){
    	$poskos = Posko::all();
    	return view('posko.table')->with('poskos', $poskos);
    }
    //show posko
    public function show($id){
    	$koord = Posko::find($id);
    	return view('posko.show')->with('koord', $koord);
    }
    //ini buat add nya :)
    public function store(PoskoRequest $request){
    	$data = $request->all();
    	$add = Posko::create($data);
    	if (!$add){
    		return 'error';
    	}
        return redirect(url('posko'));
    }

    //ini edit data
    public function editkoord($id)
    {
        $posk = Posko::find($id);
        return view('posko.edit', compact('posk'));
    }

    public function updatekoor(Request $request, $id)
    {
        $prop = Posko::find($id);
        $prop->name = $request->input('name');
        $prop->lokasi = $request->input('lokasi');
        $prop->penjwb = $request->input('penjwb');
        $prop->jmlh_dpt = $request->input('jmlh_dpt');
        

        $propUpdate = $request->only([
        'name', 'lokasi',
        'penjwb', 'jmlh_dpt']);
        $prop->update($propUpdate);
        return redirect()->route('posko');

    }
    public function destroy($id)
    {
        $koord = posko::find($id);
        $koord->delete();
        return redirect()->route('posko');
    }


    // import properti
    public function import(){
        return view('posko.upload');
    }

    public function storeimport(Request $request){
        //dd($request->all());
        if ($request->hasFile('upload-file')){

            $path = $request->file('upload-file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();

            return view('posko.showdata')->with('data', $data);
        }
        return redirect()->route('posko');
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
