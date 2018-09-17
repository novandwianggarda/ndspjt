<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;
use App\CertificateType;
use App\CertificateDoc;
use App\Http\Requests\CertificateRequest;
use Maatwebsite\Excel\Facades\Excel;

class CertificatesController extends Controller
{

    /**
     * show all certificates
     * as a table
     */
    public function index()
    {
        $certificates = Certificate::all();
        return view('certificate.table')->with('certificates', $certificates);
    }

    /**
     * show certificate
     */
    public function show($id)
    {

        $cert = Certificate::find($id);
        // print_r($cert->cerdoc->first());exit;
        return view('certificate.show')->with('certificate', $cert);

    }


    /**
     * show add new certificate form
     */
    public function showAddForm()
    {
        return view('certificate.add');
    }


    //ini buat add nya :)   
    public function store(CertificateRequest $request)
    {
        
        // dd($request->input('title'));
        //dd($request->all());
        $data = $request->all();
        $add = Certificate::create($data);
        if (!$add) { 
            return 'error';
        }
        // print_r($request->file('images')[0]);
            $file=$request->file('images');
            // echo count($file); exit;
            // $countfile=count($file);
            $titleIndex = 0;
                // print_r($file);exit;
                foreach ($file as $img) {
                    $name =time().'.'.$img->getClientOriginalName();
                    $img->move('file/certifate', $name);
                    $titleIndex++;
                    $certificate_docs = new CertificateDoc();
                    $certificate_docs->certificate_id=$add->id;
                    $certificate_docs->nama_file = $name;
                    $certificate_docs->title = $request->title[$titleIndex-1];
                    $certificate_docs->save();
                }
        // exit;
        return 'success';
    }


    // import certificate
    public function import(){
        return view('certificate.upload');
    }
    public function storeimport(Request $request){
        //dd($request->all());
        if ($request->hasFile('upload-file')){

            $path = $request->file('upload-file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();

            return view('certificate.showdata')->with('data', $data);
        }  
        return back();
    }


    

    public function tes(Request $request)
    {
        $x = json_decode($request->data);
        foreach ($x as $d => $value) {
            $certificate_type= $value->certificate_type;

            if($certificate_type){

                $certTypeId = \App\CertificateType::where('short_name', $certificate_type)->get()->first()->id;
                $ce = new Certificate();
                $ce->certificate_type_id= $certTypeId;
                $ce->folder_sert= $value->folder_sert;
                $ce->no_folder= $value->no_folder;
                $ce->kepemilikan= $value->kepemilikan;
                $ce->nama_sertifikat= $value->nama_sertifikat;
                $ce->keterangan= $value->keterangan;
                $ce->archive= $value->archive;
                $ce->no_hm_hgb= $value->no_hm_hgb;
                $ce->kelurahan= $value->kelurahan;
                $ce->kecamatan= $value->kecamatan;
                $ce->kota= $value->kota;
                $ce->published_date = date('Y-m-d', strtotime($ce->published_date));
                $ce->expired_date = date('Y-m-d', strtotime($ce->expired_date));
                $ce->luas_sertifikat= $value->luas_sertifikat;
                $ce->ajb_nominal= $value->ajb_nominal;
                $ce->ajb_date = date('Y-m-d', strtotime($ce->ajb_date));
                $ce->map_coordinate= $value->map_coordinate;
                $ce->penanggung_pbb= $value->penanggung_pbb;
                $ce->purposes= $value->purposes;
                $ce->addrees  = $value->addrees ;
                $ce->wajib_pajak= $value->wajib_pajak;
                $ce->letak_objek_pajak= $value->letak_objek_pajak;
                $ce->kelurahan_pbb= $value->kelurahan_pbb;
                $ce->kota_pbb= $value->kota_pbb;
                $ce->nop= $value->nop;
                $ce->luas_tanah_pbb= $value->luas_tanah_pbb;
                $ce->luas_bangun_pbb= $value->luas_bangun_pbb;
               
                $ce->save();
            }
            // else(

            //     $ce = new Certificate();
            //     $ce->certificate_type_id= null;
            //     $ce->folder_sert= $value->folder_sert;
            //     $ce->no_folder= $value->no_folder;
            //     $ce->kepemilikan= $value->kepemilikan;
            //     $ce->nama_sertifikat= $value->nama_sertifikat;
            //     $ce->keterangan= $value->keterangan;
            //     $ce->archive= $value->archive;
            //     $ce->no_hm_hgb= $value->no_hm_hgb;
            //     $ce->kelurahan= $value->kelurahan;
            //     $ce->kecamatan= $value->kecamatan;
            //     $ce->kota= $value->kota;

            //     $ce->published_date = date('Y-m-d', strtotime($ce->published_date));
            //     $ce->expired_date = date('Y-m-d', strtotime($ce->expired_date));
            //     $ce->luas_sertifikat= $value->luas_sertifikat;
            //     $ce->ajb_nominal= $value->ajb_nominal;
            //     $ce->ajb_date = date('Y-m-d', strtotime($ce->ajb_date));
            //     $ce->map_coordinate= $value->map_coordinate;
            //     $ce->penanggung_pbb= $value->penanggung_pbb;
            //     $ce->purpose= $value->purpose;
            //     $ce->addrees  = $value->addrees ;
            //     $ce->wajib_pajak= $value->wajib_pajak;
            //     $ce->letak_objek_pajak= $value->letak_objek_pajak;
            //     $ce->kelurahan_pbb= $value->kelurahan_pbb;
            //     $ce->kota_pbb= $value->kota_pbb;
            //     $ce->nop= $value->nop;
            //     $ce->luas_tanah_pbb= $value->luas_tanah_pbb;
            //     $ce->luas_bangun_pbb= $value->luas_bangun_pbb;
               
            //     $ce->save();
            // )

            
        }
        return redirect()->route('dashboard');

    }

}
