<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KoordinatorRequest;
use DB;
use App\Penduduk;
use App\Koordinator;
use App\Dpt;
use Maatwebsite\Excel\Facades\Excel;


class DptController extends Controller
{

    public function showAddForm()
    {
        $dptss = new Dpt();
        $kord = Koordinator::all()->pluck('name', 'id');

        return view('dpt.add', compact('dptss', 'kord'));
    }


    //show all koordinator as a table
    public function index(){
    	$koordinators = Koordinator::all();
    	return view('koordinator.table')->with('koordinators', $koordinators);
    }
    //show koordinator
    public function show($id){
    	$koord = Koordinator::find($id);
    	return view('koordinator.show')->with('koord', $koord);
    }
    //ini buat add nya :)
    public function store(KoordinatorRequest $request){
    	$data = $request->all();
    	$add = Koordinator::create($data);
    	if (!$add){
    		return 'error';
    	}
        return redirect(url('koordinator'));
    }

    //ini edit data
    public function editkoord($id)
    {
        $pend = Koordinator::find($id);
        return view('koordinator.edit', compact('pend'));
    }

    public function updatekoor(Request $request, $id)
    {
        $prop = Koordinator::find($id);
        $prop->name = $request->input('name');
        $prop->address = $request->input('address');
        $prop->kabkot = $request->input('kabkot');
        $prop->tps = $request->input('tps');
        $prop->telephone = $request->input('telephone');
        

        $propUpdate = $request->only([
        'name', 'address',
        'kabkot', 'tps', 'telephone']);
        $prop->update($propUpdate);
        return redirect()->route('koordinator');

    }
    public function destroy($id)
    {
        $koord = Koordinator::find($id);
        $koord->delete();
        return redirect()->route('koordinator');
    }


    // import properti
    public function import(){
        return view('koordinator.upload');
    }

    public function storeimport(Request $request){
        //dd($request->all());
        if ($request->hasFile('upload-file')){

            $path = $request->file('upload-file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();

            return view('koordinator.showdata')->with('data', $data);
        }
        return redirect()->route('koordinator');
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
