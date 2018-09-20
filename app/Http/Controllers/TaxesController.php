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

    public function edittax($id)
    {
        $t=Tax::find($id);
        $cert = Certificate::all()->pluck('no_hm_hgb', 'id');
        return view('tax.edit', compact('t', 'cert'));
    }

    public function updatetax(Request $request, $id)
    {
        //dd($request->all());
        $t = Tax::find($id);
        $t->folder_pbb = $request->input('folder_pbb');
        $t->luas_sertifikat = $request->input('luas_sertifikat');
        $t->rencana_group = $request->input('rencana_group');
        $t->pen_pbb = $request->input('pen_pbb');
        $t->wajib_pajak = $request->input('wajib_pajak');
        $t->letak_objek_pajak = $request->input('letak_objek_pajak');
        $t->kelurahan_pbb = $request->input('kelurahan_pbb');
        $t->kota_pbb = $request->input('kota_pbb');
        $t->nop = $request->input('nop');
        $t->luas_tanah_pbb = $request->input('luas_tanah_pbb');
        $t->luas_bangun_pbb = $request->input('luas_bangun_pbb');
        $t->year = $request->input('year');
        $t->njop_land = $request->input('njop_land');
        $t->njop_building = $request->input('njop_building');
        $t->njop_total = $request->input('njop_total');
        $t->nominal_ly = $request->input('nominal_ly');
        $t->due_date = $request->input('due_date');
        $t->due_date_ly = $request->input('due_date_ly');
        $t->selisih = $request->input('selisih');

        $tUpdate = $request->only([
        'certificate_id', 'folder_pbb', 'luas_sertifikat', 'purposes', 'rencana_group',
        'pen_pbb', 'wajib_pajak', 'letak_objek_pajak', 'kelurahan_pbb', 'kota_pbb', 'nop', 'luas_tanah_pbb',
        'luas_bangun_pbb', 'year', 'njop_land', 'njop_building', 'njop_total', 'nominal_ly', 'due_date', 'selisih', 'due_date_ly']);
        $t->update($tUpdate);

        return redirect(url('dashboard'));
    }
    public function destroy($id)
    {
        $t=Tax::find($id);
        $t->delete();
        return redirect()->back()->with('success', ['Delete Success']);
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
                $taxes->luas_sertifikat= $value->luas_sertifikat;
                $taxes->folder_pbb= $value->folder_pbb;
                $taxes->rencana_group= $value->rencana_group;
                
                $taxes->pen_pbb= $value->pen_pbb;

                $taxes->wajib_pajak= $value->wajib_pajak;
                $taxes->letak_objek_pajak= $value->letak_objek_pajak;

                $taxes->kelurahan_pbb= $value->kelurahan_pbb;
                $taxes->kota_pbb= $value->kota_pbb;
                $taxes->nop= $value->nop;

                $taxes->luas_tanah_pbb= $value->luas_tanah_pbb;
                $taxes->luas_bangun_pbb= $value->luas_bangun_pbb;

                
                $taxes->njop_land= $value->njop_land;  
                $taxes->njop_building= $value->njop_building;
                $taxes->njop_total= $value->njop_total;
                $taxes->nominal_ly= $value->nominal_ly;

                $taxes->due_date = date('Y-m-d', strtotime($taxes->due_date));
                $taxes->due_date_ly = date('Y-m-d', strtotime($taxes->due_date_ly));
                $taxes->selisih= $value->selisih;
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
        $certificates = Certificate::all()->pluck('no_hm_hgb', 'id');
        return view('tax.add', compact('certificates'));
    }
    //ini buat add nya :)
    public function store(TaxRequest $request)
    {

        //dd($request->all());
        $t = new Tax();
        $t->due_date=$request->input('due_date');
        $t->due_date_ly=$request->input('due_date_ly');
        $t->nominal_ly=$request->input('nominal_ly');
        $t->folder_pbb = $request->input('folder_pbb');
        $t->purposes = $request->input('purposes');
        $t->luas_sertifikat = $request->input('luas_sertifikat');
        $t->rencana_group = $request->input('rencana_group');
        $t->pen_pbb = $request->input('pen_pbb');
        $t->wajib_pajak = $request->input('wajib_pajak');
        $t->letak_objek_pajak = $request->input('letak_objek_pajak');
        $t->kelurahan_pbb = $request->input('kelurahan_pbb');
        $t->kota_pbb = $request->input('kota_pbb');
        $t->nop = $request->input('nop');
        $t->luas_tanah_pbb = $request->input('luas_tanah_pbb');
        $t->luas_bangun_pbb = $request->input('luas_bangun_pbb');
        $t->year = $request->input('year');
        $t->njop_land = $request->input('njop_land');
        $t->njop_building = $request->input('njop_building');
        $t->njop_total = $request->input('njop_total');
        $t->nominal_ly = $request->input('nominal_ly');
        $t->due_date = $request->input('due_date');
        $t->due_date_ly = $request->input('due_date_ly');
        $t->selisih = $request->input('selisih');



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