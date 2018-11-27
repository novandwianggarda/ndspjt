<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;
use App\Tax;
use App\CertificateType;
use App\CertificateDoc;
use DB;
use Storage;
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
        $i=1;
        $certificates = Certificate::all();
        return view('certificate.table', compact('certificates', 'i'));
    }

    /**
     * show certificate
     */
    public function show($id)
    {
        $certificate = Certificate::find($id);
        return view('certificate.show', compact('certificate'));
    }
    //filtershow
    public function filter()    
    {
        $certificates = Certificate::all();
        return view('certificate.filter', compact('certificates'));
    }
    public function certid(Request $request)    
    {
        $certificate = Certificate::where('no_hm_hgb', $request->no_hm_hgb)->get()->first();
        // print_r($certificate->count());exit;
        return view('certificate.shows', compact('certificate'));
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
        \LogActivity::addToLog('add new Certificate');
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
        $cert->kepemilikan = $request->input('kepemilikan');
        $cert->nama_sertifikat = $request->input('nama_sertifikat');
        $cert->keterangan = $request->input('keterangan');
        $cert->archive = $request->input('archive');
        $cert->no_hm_hgb = $request->input('no_hm_hgb');
        $cert->kelurahann = $request->input('kelurahann');
        $cert->kecamatan = $request->input('kecamatan');
        $cert->purposes = $request->input('purposes');
        $cert->kota = $request->input('kota');
        $cert->published_date = $request->input('published_date');
        $cert->expired_date = $request->input('expired_date');
        $cert->ajb_nominal = $request->input('ajb_nominal');
        $cert->ajb_date = $request->input('ajb_date');
            $file=$request->file('images');
            $titleIndex = 0;
                foreach ($file as $img) {
                    $name =time().'.'.$img->getClientOriginalName();
                    $img->move('file/certifate', $name);
                    $titleIndex++;
                    $certificate_docs = new CertificateDoc();
                    $certificate_docs->certificate_id=$cert->id;
                    $certificate_docs->nama_file = $name;
                    $certificate_docs->title = $request->title[$titleIndex-1];
                    $certificate_docs->save();

                    $oldPhoto=$certificate_docs->img;

                    $certificate_docs->image=$name;
                    Storage::delete($oldPhoto);
                }
        $cert->boundary_coordinates = $request->input('boundary_coordinates');
        $cert->addrees = $request->input('addrees');

        $certUpdate = $request->only([
        'certificate_type_id', 'folder_sert', 'no_folder',
        'kepemilikan', 'nama_sertifikat', 'purposes', 'keterangan', 'archive', 'no_hm_hgb', 'kelurahann', 'kecamatan',
        'kota', 'published_date', 'expired_date', 'luas_sertifikat', 'ajb_nominal', 'ajb_date', 'boundary_coordinates', 'addrees']);
        $cert->update($certUpdate);
        \LogActivity::addToLog('Update Certificate');

        return redirect(url('dashboard'));
    }
    public function destroycert($id)
    {
        $cert=Certificate::find($id);
        $cert->delete();
        \LogActivity::addToLog('Hapus data Certificate');
        return redirect()->route('certificates');
    }

    // import certificate
    public function import(){
        return view('certificate.upload');
    }
    public function storeimport(Request $request){
        if ($request->hasFile('upload-file')){

            $path = $request->file('upload-file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();
            
            //dd($data);
            return view('certificate.showdata')->with('data', $data);
        }  
        return redirect()->route('certificates');
    }


    public function tes(Request $request)
    {
        $x = json_decode($request->data);
        
        foreach ($x as $d => $value) {
            $certificate_type= $value->certificate_type;
            if($certificate_type){
                $certTypeId = \App\CertificateType::where('short_name', $certificate_type)->get()->first()->id;
                $cert = new Certificate();
                $folder_sert = $value->folder_sert;
                $no_folder = $value->no_folder;
                $kepemilikan = $value->kepemilikan;
                $nama_sertifikat = $value->nama_sertifikat;
                $keterangan = $value->keterangan;
                $archive = $value->archive;
                $certificate_type_id= $certTypeId;
                $no_hm_hgb = $value->no_hm_hgb;
                $kelurahann = $value->kelurahann;
                $kecamatan = $value->kecamatan;
                $kota = $value->kota;
                $nop = $value->nop;
                $published_date= @$value->published_date->date;
                $expired_date= @$value->expired_date->date;
                $addrees  = $value->addrees ;
                $purposes = $value->purposes;
                $ajb_nominal= $value->ajb_nominal;
                $ajb_date= @$value->ajb_date->date;
                $boundary_coordinates= $value->boundary_coordinates;

                if($no_hm_hgb){
                    $cert = Certificate::firstOrCreate([
                        'folder_sert' => $folder_sert, 
                        'no_folder' => $no_folder, 
                        'kepemilikan' => $kepemilikan, 
                        'nama_sertifikat' => $nama_sertifikat, 
                        'keterangan' => $keterangan, 
                        'archive' => $archive, 
                        'certificate_type_id' => $certificate_type_id, 
                        'no_hm_hgb' => $no_hm_hgb, 
                        'kelurahann' => $kelurahann, 
                        'kecamatan' => $kecamatan, 
                        'kota' => $kota, 
                        'nop' => $nop, 
                        'published_date' => $published_date, 
                        'expired_date' => $expired_date, 
                        'addrees' => $addrees, 
                        'purposes' => $purposes, 
                        'ajb_nominal' => $ajb_nominal, 
                        'ajb_date' => $ajb_date, 
                        'boundary_coordinates' => $boundary_coordinates]);
                }else{
                    $cert->save();
                }
            }

            \DB::table('certificates')
                ->where('no_hm_hgb', $cert->no_hm_hgb)
                ->update(['kelurahann' => $cert->kelurahann, 
                    'folder_sert' => $cert->folder_sert,
                    'no_folder' => $cert->no_folder,
                    'kepemilikan' => $cert->kepemilikan,
                    'nama_sertifikat' => $cert->nama_sertifikat,
                    'keterangan' => $cert->keterangan,
                    'archive' => $cert->archive,
                    'certificate_type_id' => $cert->certificate_type_id,
                    'kelurahann' => $cert->kelurahann,
                    'kecamatan' => $cert->kecamatan,
                    'kota' => $cert->kota,
                    'nop' => $cert->nop,
                    'published_date' => $cert->published_date,
                    'expired_date' => $cert->expired_date,
                    'addrees' => $cert->addrees,
                    'purposes' => $cert->purposes,
                    'ajb_nominal' => $cert->ajb_nominal,
                    'ajb_date' => $cert->ajb_date,
                    'boundary_coordinates' => $cert->boundary_coordinates
            ]);

        }
        \LogActivity::addToLog('Import xls Certificate');
        return redirect()->route('certificates');
    }

    //eksport data
    public function eksport(){
        $certificates = Certificate::all();
        return view('certificate.eksport')->with('certificates', $certificates);
    }

   public function eksported(){
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
                'Kelurahan' => $certificates->kelurahann,
                'Kecamatan' => $certificates->kecamatan,
                'Kota' => $certificates->kota,
                'Tgl Terbit' => $certificates->published_date,
                'Tgl Akhir' => $certificates->expired_date,
                'Luas Sertifikat' => @ Certificate::find($certificates->id)->certax->first()->luas_sertifikat,
                'Alamat' => $certificates->addrees,
                'AJB Nominal' => $certificates->ajb_nominal,
                'AJB Date' => $certificates->ajb_date,
                'Map' => $certificates->boundary_coordinates,
                'Purposes' => @ Certificate::find($certificates->id)->certax->first()->purposes,
                'Penanggung PBB' => @ Certificate::find($certificates->id)->certax->first()->pen_pbb,
                'Wajib Pajak' => @ Certificate::find($certificates->id)->certax->first()->wajib_pajak,
                'Letak Objek Pajak' => @ Certificate::find($certificates->id)->certax->first()->letak_objek_pajak,
                'Kota Pajak' => @ Certificate::find($certificates->id)->certax->first()->kota_pbb,
                'NOP' => @ Certificate::find($certificates->id)->certax->first()->nop,
                'Luas Tanah PBB' => @ Certificate::find($certificates->id)->certax->first()->luas_tanah_pbb,
                'Luas Bangun PBB' => @ Certificate::find($certificates->id)->certax->first()->luas_bangun_pbb,
            );
        }
        // dd($certificate_data);
        Excel::create('Certificate Data', function($excel) use (
            $certificate_array){
            $excel->setTitle('Certificate Data');
            $excel->sheet('Certificate Data', function($sheet)
                use($certificate_array){
                    $sheet->fromArray($certificate_array, null, 'A1', false, false);
                });
        })->download('xlsx');
        \LogActivity::addToLog('Export xls Certificate');
    }

    

}
