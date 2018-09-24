<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;
use App\CertificateType;
use App\CertificateDoc;
use DB;
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



    public function editcert($id)
    {
        $cert=Certificate::find($id);
        $certype = CertificateType::all()->pluck('short_name', 'id');
        return view('certificate.edit', compact('cert', 'certype'));
    }

    
    public function updatecert(Request $request, $id)
    {
        //dd($request->all());
        $cert = Certificate::find($id);
        $cert->folder_sert = $request->input('folder_sert');
        $cert->no_folder = $request->input('no_folder');
        $cert->purposes = $request->input('purposes');
        $cert->kepemilikan = $request->input('kepemilikan');
        $cert->nama_sertifikat = $request->input('nama_sertifikat');
        $cert->keterangan = $request->input('keterangan');
        $cert->archive = $request->input('archive');
        $cert->no_hm_hgb = $request->input('no_hm_hgb');
        $cert->kelurahan = $request->input('kelurahan');
        $cert->kecamatan = $request->input('kecamatan');
        $cert->kota = $request->input('kota');
        $cert->published_date = $request->input('published_date');
        $cert->expired_date = $request->input('expired_date');
        $cert->luas_sertifikat = $request->input('luas_sertifikat');

        $cert->ajb_nominal = $request->input('ajb_nominal');
        $cert->ajb_date = $request->input('ajb_date');
        $cert->map_coordinate = $request->input('map_coordinate');
        $cert->addrees = $request->input('addrees');

        $certUpdate = $request->only([
        'certificate_type_id', 'folder_sert', 'no_folder', 'purposes',
        'kepemilikan', 'nama_sertifikat', 'keterangan', 'archive', 'no_hm_hgb', 'kelurahan', 'kecamatan',
        'kota', 'published_date', 'expired_date', 'luas_sertifikat', 'ajb_nominal', 'ajb_date', 'map_coordinate', 'addrees']);
        $cert->update($certUpdate);

        return redirect(url('dashboard'));
    }
    public function destroycert($id)
    {
        $cert=Certificate::find($id);
        $cert->delete();
        return redirect('dashboard');
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
                $ce->addrees  = $value->addrees ;
                
                $ce->ajb_nominal= $value->ajb_nominal;
                $ce->ajb_date = date('Y-m-d', strtotime($ce->ajb_date));
                $ce->map_coordinate= $value->map_coordinate;

               
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




    public function eksport(){
        $certificates = Certificate::all();
        return view('certificate.eksport')->with('certificates', $certificates);
    }

   public function eksported(){
        //dd($request->all());

        $certificate_data = DB::table('certificates')->get()->toArray();  
        $certificate_array[] = array('Folder Serifikat', 'No Folder', 'Kepemilikan', 'Nama Setifikat', 'Keterangan', 'Archive', 'Type Sertifikat', 'No HM / HGB', 'Kelurahan', 'Kecamatan', 'Kota', 'Tgl Terbit', 'Tgl Akhir', 'Luas Sertifikat', 'Alamat', 'AJB Nominal', 'AJB Tanggal', 'Map Coordinate', 'Purpose', 'Penanggung PBB', 'Wajib Pajak', 'Letak Objek Pajak', 'Kelurahan PBB', 'Kota PBB', 'NOP', 'Luas Tanah PBB', 'Luas Bangun PBB');

        foreach ($certificate_data as $certificates) 
        {
            $certificate_array[] = array(
                'Folder Serifikat' => $certificates->folder_sert,
                'No Folder' => $certificates->no_folder,
                'Kepemilikan' => $certificates->kepemilikan,
                'Nama Setifikat' => $certificates->nama_sertifikat,
                'Keterangan' => $certificates->keterangan,
                'Archive' => $certificates->archive,
                'Type Sertifikat' => \App\CertificateType::find($certificates->certificate_type_id)->short_name,
                'No HM / HGB' => $certificates->no_hm_hgb,
                'Kelurahan' => $certificates->kelurahan,
                'Kecamatan' => $certificates->kecamatan,
                'Kota' => $certificates->kota,
                'Tgl Terbit' => $certificates->published_date,
                'Tgl Akhir' => $certificates->expired_date,
                'Luas Sertifikat' => @ Certificate::find($certificates->id)->certif->first()->luas_sertifikat,
                'Alamat' => $certificates->addrees,
                'AJB Nominal' => $certificates->ajb_nominal,
                'AJB Date' => $certificates->ajb_date,
                'Map' => $certificates->map_coordinate,
                'Purposes' => @ Certificate::find($certificates->id)->certif->first()->purposes,
                'Penanggung PBB' => @ Certificate::find($certificates->id)->certif->first()->pen_pbb,
                'Wajib Pajak' => @ Certificate::find($certificates->id)->certif->first()->wajib_pajak,
                'Letak Objek Pajak' => @ Certificate::find($certificates->id)->certif->first()->letak_objek_pajak,
                'Kota Pajak' => @ Certificate::find($certificates->id)->certif->first()->kota_pbb,
                'NOP' => @ Certificate::find($certificates->id)->certif->first()->nop,
                'Luas Tanah PBB' => @ Certificate::find($certificates->id)->certif->first()->luas_tanah_pbb,
                'Luas Bangun PBB' => @ Certificate::find($certificates->id)->certif->first()->luas_bangun_pbb
            );
        }


        Excel::create('Certificate Data', function($excel) use (
            $certificate_array){
            $excel->setTitle('Certificate Data');
            $excel->sheet('Certificate Data', function($sheet)
                use($certificate_array){
                    $sheet->fromArray($certificate_array, null, 'A1', false, false);
                });
        })->download('xlsx');
    }

    

}
