<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tax;
use App\Certificate;
use App\Http\Requests\TaxRequest;
use Maatwebsite\Excel\Facades\Excel;

class TaxesController extends Controller
{
    /**
     * show all taxes
     * as a table
     */
    public function index()
    {
        $taxes = Tax::all();
        return view('tax.table')->with('taxes', $taxes);
    }

    /**
     * show tax
     */
    public function show($id)
    {
        $tax = Tax::find($id);
        return view('tax.show')->with('tax', $tax);
    }

    //import taxes

    public function import(){
        return view('tax.upload');
    }

    public function storeimport(Request $request){
        //dd($request->all());
        if ($request->hasFile('upload-file')){
            $path = $request->file('upload-file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();
            return view('tax.showdata')->with('data', $data);
        }   
        return back();
    }

    public function tes(Request $request){
        $x = json_decode($request->data);
        foreach ($x as $d => $value) {
            $no_hm= $value->no_hm;

            if($no_hm){

                $nohm = \App\Certificate::where('no_hm_hgb', $no_hm)->get()->first()->id;
                   
                $taxes = new Tax();
                $taxes->certificate_id= $nohm;
                $taxes->folder_pbb= $value->folder_pbb;
                $taxes->rencana_group= $value->rencana_group;
                $taxes->year= $value->year;
                $taxes->njop_land= $value->njop_land;  
                $taxes->njop_building= $value->njop_building;
                $taxes->njop_total= $value->njop_total;
                $taxes->selisih= $value->selisih;
                $taxes->due_date = date('Y-m-d', strtotime($taxes->due_date));
                $taxes->due_date_ly = date('Y-m-d', strtotime($taxes->due_date_ly));
                $taxes->save();
            }
        }
        return redirect()->route('dashboard');
    }


    /**
     * show add new tax form
     */
    public function showAddForm()
    {

        // return view('tax.add');
        $certificates = Certificate::all()->pluck('nama_sertifikat', 'id');
        return view('tax.add', compact('certificates'));
    }
    //ini buat add nya :)
    public function store(TaxRequest $request)
    {

        //dd($request->all());
        $t = new Tax();
        $t->folder_pbb=$request->input('folder_pbb');
        $t->rencana_group=$request->input('rencana_group');
        $t->year=$request->input('year');
        $t->njop_land=$request->input('njop_land');
        $t->njop_building=$request->input('njop_building');
        $t->due_date=$request->input('due_date');
        $t->certificate_id=$request->input('certificate_id');
        $t->due_date_ly=$request->input('due_date_ly');
        $t->nominal_ly=$request->input('nominal_ly');

        $t->save();
        return redirect(url('dashboard'));
        
        // $data = $request->all();
        // $add = tax::create($data);
        // if (!$add) {
        //     return 'error';
        // }
        // return 'succes';
    }
}