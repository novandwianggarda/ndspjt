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
            
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                   
                    $certificate = new Certificate();
                    $certificate->certificate_type_id= $value->certificate_type_id;
                    $certificate->number= $value->number;
                    $certificate->name= $value->name;
                    $certificate->nop= $value->nop;
                    $certificate->owner= $value->owner;
                    $certificate->area= $value->area;
                    $certificate->published_date= $value->published_date;
                    $certificate->expired_date= $value->expired_date;
                    $certificate->note= $value->note;
                    $certificate->addr_city= $value->addr_city;
                    $certificate->addr_district= $value->addr_district;
                    $certificate->addr_village= $value->addr_village;
                    $certificate->addr_address= $value->addr_address;
                    $certificate->ajb_nominal= $value->ajb_nominal;
                    $certificate->ajb_date= $value->ajb_date;
                    $certificate->scan_certificate= $value->scan_certificate;
                    $certificate->scan_plotting= $value->scan_plotting;
                    $certificate->scan_land_siteplan= $value->scan_land_siteplan;
                    $certificate->scan_krk= $value->scan_krk;
                    $certificate->scan_imb= $value->scan_imb;
                    $certificate->map_coordinate= $value->map_coordinate;
                    $certificate->map_boundary= $value->map_boundary;
                    $certificate->map_link= $value->map_link;
                    $certificate->folder_number= $value->folder_number;
                    $certificate->folder_current= $value->folder_current;
                    $certificate->folder_plan= $value->folder_plan;
                    $certificate->save();
                }
            }
        }   
        return back();
    }

    
}
