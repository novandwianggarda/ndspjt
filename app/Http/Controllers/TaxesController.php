<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tax;
use App\Year;
use App\Certificate;
use App\Http\Requests\TaxRequest;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class TaxesController extends Controller
{
    /**
     * show all taxes
     * as a table
     */
    public function index()
    {
        $i=1;
        $taxes = Tax::all();
        $certificates = Certificate::all();
        return view('tax.table', compact('taxes', 'certificates', 'i'));
    }

    public function tahun()
    {
        $i=1;
        $years = Year::all();
        return view('tax.year.table', compact('years', 'i'));
    }

    // public function tahunadd()
    // {
    //     $years = Year::all();
    //     $certificates = Certificate::all()->pluck('no_hm_hgb', 'id');
    //     $taxs = Tax::all()->pluck('nop', 'id');
    //     return view('tax.year.year', compact('years', 'taxs'));
    // }

    public function tahunadd()
    {
        $certificates = Certificate::all();
        $taxs = Tax::all()->pluck('nop', 'id');
        return view('tax.year.year', compact('taxs', 'certificates'));
    }
    public function storeyearadd(Request $request)
    {

        //dd($request->all());
        $t = new Year();
        
        $t->year = $request->input('year');
        $t->njop_land = $request->input('njop_land');
        $t->njop_building = $request->input('njop_building');
        $t->njop_total = $request->input('njop_total');

        $t->ptkp = $request->input('ptkp');
        $t->stimulus = $request->input('stimulus');
        $t->pbbygdbyr = $request->input('pbbygdbyr');
        $t->certificate_ids=$request->input('certificate_ids');
        $t->tax_ids=$request->input('tax_ids');
        $t->save();
        return redirect()->route('year');
    }

    public function edityear($id)
    {
        $y = Year::find($id);
        return view('tax.year.edit', compact('y'));
    }

    public function destroyyear($id)
    {
        $year = Year::find($id);
        $year->delete();
        return redirect()->route('year');
    }

    public function showyear($id)
    {
        $year = Year::find($id);
        return view('tax.year.show', compact('year'));
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
        // $t->nominal_ly = $request->input('nominal_ly');
        $t->due_date = $request->input('due_date');
        $t->due_date_ly = $request->input('due_date_ly');
        $t->selisih = $request->input('selisih');

        $tUpdate = $request->only([
        'folder_pbb', 'luas_sertifikat', 'purposes', 'rencana_group',
        'pen_pbb', 'wajib_pajak', 'letak_objek_pajak', 'kelurahan_pbb', 'kota_pbb', 'nop', 'luas_tanah_pbb',
        'luas_bangun_pbb', 'year', 'njop_land', 'njop_building', 'njop_total', 'nominal_ly', 'due_date', 'selisih', 'due_date_ly']);

        $updatecertax = DB::table('certi_taxs')->where('tax_id', $id)->update(['certificate_ids' => $request->input('certificate_ids')]);
        $t->update($tUpdate);
        return redirect()->route('taxes');
    }
    public function destroy($id)
    {
        $t=Tax::find($id);
        $t->delete();
        return redirect()->route('taxes');
    }


    /**
     * show tax
     */
    public function show($id)
    {
        $tax = Tax::find($id);
        return view('tax.shows')->with('tax', $tax);
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
            $no_hm = $value->no_hm;
            if($no_hm){
                $no_hm = \App\Certificate::where('no_hm_hgb', $no_hm)->get()->first()->id;

                $taxes = new Tax();

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
                
                $taxes->due_date= $value->due_date->date;
                $taxes->due_date_ly= $value->due_date_ly->date;

                $taxes->selisih= $value->selisih;
                $taxes->save();
                $taxes->certax()->attach($request->certificate_ids= $no_hm);
            }
        }
        return redirect()->route('taxes');
    }


    //import 1 pbb banyak sertifikat
    public function importsert(){
        return view('tax.1pbb.uploadsert');
    }

    public function storeimportsert(Request $request){
        //dd($request->all());
        if ($request->hasFile('upload-file')){
            $path = $request->file('upload-file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();
            return view('tax.1pbb.showdatasert')->with('data', $data);
        }   
        return back();
    }

    public function tessert(Request $request){
        $x = json_decode($request->data);

        
        foreach ($x as $d => $value) {
            $nop = $value->nop;
            if($nop){
                $nop = \App\Certificate::where('nop', $nop)->get()->first()->id;

                $taxes = new Tax();

                $taxes->luas_sertifikat= $value->luas_sertifikat;
                $taxes->folder_pbb= $value->folder_pbb;
                $taxes->rencana_group= $value->rencana_group;
                
                $taxes->pen_pbb= $value->pen_pbb;

                $taxes->wajib_pajak= $value->wajib_pajak;
                $taxes->letak_objek_pajak= $value->letak_objek_pajak;

                $taxes->kelurahan_pbb= $value->kelurahan_pbb;
                $taxes->kota_pbb= $value->kota_pbb;

                $taxes->luas_tanah_pbb= $value->luas_tanah_pbb;
                $taxes->luas_bangun_pbb= $value->luas_bangun_pbb;

                
                $taxes->njop_land= $value->njop_land;  
                $taxes->njop_building= $value->njop_building;
                $taxes->njop_total= $value->njop_total;
                $taxes->pbbly= $value->pbbly;
                $taxes->nop= $value->nop;
                

                $taxes->due_date= $value->due_date->date;
                $taxes->due_date_ly= $value->due_date_ly->date;
                $taxes->selisih= $value->selisih;
                $taxes->save();

                //ambil NOP yg sama
                $nocert = $x[0]->nop;
                $certificates = Certificate::where('nop', $nocert)->get();
                foreach ($certificates as $cert) {
                    DB::table('certi_taxs')
                    ->insert(['tax_id'=>$taxes->id, 'certificate_ids'=>$cert->id]);
                }
                // $taxes->certax()->attach($request->certificate_id= $nop);
            }
        }
        return redirect()->route('taxes');
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
        $t->certax()->attach($request->input('certificate_ids'));
        return redirect()->route('taxes');
    }


    public function eksport(){
        $taxes = Tax::all();
        return view('tax.eksport')->with('taxes', $taxes);
    }

   public function eksported(){
        //dd($request->all());

        $tax_data = DB::table('taxes')->get();  
        $tax_array[] = array('Nama Sertifikat', 'Jenis Sertifikat', 'Folder PBB', 'Rencana Group', 'Luas Sertifikat', 'Wajib Pajak', 'Letak Objek Pajak', 'Kelurahan', 'Kota', 'Penanggung PBB', 'NOP', 'Luas Tanah PBB', 'Luas Bangun PBB', 'Tahun', 'NJOP Tanah', 'NJOP Bangunan', 'NJOP Total', 'Nominal', 'Tanggal Awal', 'Tanggal Akhir', 'Selisih');

        foreach ($tax_data as $taxess)
        {
            $tax = Tax::find($taxess->id); 


                $nama_sertifikats = null;
                $short_names = null;
                foreach ($tax->certax as $t) {
                    $nama_sertifikats.=$t->nama_sertifikat;
                    $short_names.= $t->first()->type->short_name;
                }
            $tax_array[] = array(


                'Nama Sertifikat' => $nama_sertifikats,
                'Jenis Sertifikat' => $short_names,
                'Folder PBB' => $tax->folder_pbb,
                'Rencana Group' => $tax->rencana_group,
                'Luas Sertifikat' => $tax->luas_sertifikat,
                'Wajib Pajak' => $tax->wajib_pajak,
                'Letak Objek Pajak' => $tax->letak_objek_pajak,
                'Kelurahan' => $tax->kelurahan_pbb,
                'Kota' => $tax->kota_pbb,
                'Penanggung PBB' => $tax->pen_pbb,
                'NOP' => $tax->nop,
                'Luas Tanah PBB' => $tax->luas_tanah_pbb,
                'Luas Bangun PBB' => $tax->luas_bangun_pbb,
                'Tahun' => $tax->year,
                'NJOP Tanah' => $tax->njop_land,
                'NJOP Bangunan' => $tax->njop_building,
                'NJOP Total' => $tax->njop_total,
                'Nominal' => $tax->nominal_ly,
                'Tanggal Awal' => $tax->due_date,
                'Tanggal Akhir' => $tax->due_date_ly,
                'Selisih' => $tax->selisih,
            );
        }


        Excel::create('PBB', function($excel) use (
            $tax_array){
            $excel->setTitle('PBB');
            $excel->sheet('PBB', function($sheet)
                use($tax_array){
                    $sheet->fromArray($tax_array, null, 'A1', false, false);
                });
        })->download('xlsx');
    }
}