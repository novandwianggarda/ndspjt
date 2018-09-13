<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;
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
        
        //dd($request->input('title'));
        $data = $request->all();
        $add = Certificate::create($data);
        if (!$add) { 
            return 'error';
        }
        // print_r($request->file('images')[0]);
                $file=$request->file('images');
                // print_r($file);exit;
                foreach ($file as $img) {
                    $name =time().'.'.$img->getClientOriginalName();
                    $img->move('file/certifate', $name);
                    $certificate_docs = new CertificateDoc();
                    $certificate_docs->certificate_id=$add->id;
                    // $certif->title = $request->input('title')[$img];
                    $certificate_docs->nama_file = $name;
                    $certificate_docs->save();
                }
        // exit;
         

        return 'success';
    }


    // public function store(Request $request)
    // {
    //     dd($request->images());

    //     $certif = new Certificate();
    //     $certif->judul = $request->input('judul');
    //     $certif->number = $request->input('number');
    //     $certif->name = $request->input('name');
    //     $certif->nop = $request->input('nop');
    //     $certif->owner = $request->input('owner');
    //     $certif->area = $request->input('area');
    //     $certif->published_date = $request->input('published_date');
    //     $certif->expired_date = $request->input('expired_date');
    //     $certif->note = $request->input('note');
    //     $certif->addr_city = $request->input('addr_city');
    //     $certif->addr_district = $request->input('addr_district');
    //     $certif->addr_village = $request->input('addr_village');
    //     $certif->addr_address = $request->input('addr_address');
    //     $certif->ajb_nominal = $request->input('ajb_nominal');
    //     $certif->ajb_date = $request->input('ajb_date');
    //     $certif->scan_certificate = $request->input('scan_certificate');
    //     $certif->scan_plotting = $request->input('scan_plotting');
    //     $certif->map_coordinate = $request->input('map_coordinate');
    //     $certif->map_boundary = $request->input('map_boundary');
    //     $certif->map_link = $request->input('map_link');
    //     $certif->folder_number = $request->input('folder_number');
    //     $certif->folder_current = $request->input('folder_current');
    //     $certif->folder_plan = $request->input('folder_plan');



    //     if ($request->hasFile('file')){
    //         $file=$request->file('file');
    //         $path='file/certifate';
    //         $name=time().'.'.$file->getClientOriginalExtension();
    //         $file->move($path,$name);
    //         $certif->gambar=$name;
    //     }else{
    //         $certif->gambar='';
    //     }
    //     $certif->save();
    //     //return ($berita->tag);
    //     return redirect('/supberita');
    // }



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
        // $x = json_decode($request->data);
        // foreach ($x as $d) {
        //     echo $d->certificate_type;
        // }
        $cert = json_decode($request->data);
        foreach ($cert as $ce => $value) {

            $certificateTypeId = \App\CertificateType::where('short_name', strtolower($value->certificate_type))->first()->id;

            $certificates = new Certificate();
            $certificates->certificate_type_id= $certificateTypeId;
            $certificates->number= $value->number;
            $certificates->name= $value->name;
            $certificates->nop= $value->nop;
            $certificates->owner= $value->owner;
            $certificates->area= $value->area;
            $certificates->published_date = date('Y-m-d', strtotime($certificates->published_date));
            $certificates->expired_date = date('Y-m-d', strtotime($certificates->expired_date));
            $certificates->note= $value->note;
            $certificates->addr_city= $value->addr_city;
            $certificates->addr_district= $value->addr_district;
            $certificates->addr_village= $value->addr_village;
            $certificates->addr_address= $value->addr_address;
            $certificates->ajb_nominal= $value->ajb_nominal;
            $certificates->ajb_date = date('Y-m-d', strtotime($certificates->ajb_date));
            $certificates->scan_certificate= $value->scan_certificate;
            $certificates->scan_plotting= $value->scan_plotting;
            $certificates->scan_land_siteplan= $value->scan_land_siteplan;
            $certificates->scan_krk= $value->scan_krk;
            $certificates->scan_imb= $value->scan_imb;
            $certificates->map_coordinate= $value->map_coordinate;
            $certificates->map_boundary= $value->map_boundary;
            $certificates->map_link= $value->map_link;
            $certificates->folder_number= $value->folder_number;
            $certificates->folder_current= $value->folder_current;
            $certificates->folder_plan= $value->folder_plan;
            $certificates->save();
        }
        return redirect()->route('dashboard');

    }


    
}
