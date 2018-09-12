<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;
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
        $data = $request->all();
        $add = Certificate::create($data);
        if (!$add) {
            return 'error';
        }
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
