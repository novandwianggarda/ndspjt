<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lease;
use App\Certificate;
use App\Http\Requests\LeaseRequet;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class LeasesController extends Controller
{
    /**
     * show all leases
     * as a table
     */
    public function index()
    {
        $leases = Lease::all();
        return view('lease.table')->with('leases', $leases);
    }

    /**
     * show lease
     */
    public function show($id)
    {
        $lease = Lease::find($id);
        return view('lease.show')->with('lease', $lease);
    }

    /**
     * show add new lease form
     */
    public function showAddForm()
    {
        $certificates = Certificate::all();
        return view('lease.add');
    }

    public function store(LeaseRequet $request)
    {
        $data = $request->all();
        //dd($data);
        // parse to int
        $data['brok_fee_yearly'] = (int)$data['brok_fee_yearly'];
        $data['brok_fee_paid'] = (int)$data['brok_fee_paid'];
        // parse to date
        $data['start'] = empty($data['start']) ? null : $this->parseDate($data['start']);
        $data['end'] = empty($data['end']) ? null : $this->parseDate($data['end']);
        $data['grace_start'] = empty($data['grace_start']) ? null : $this->parseDate($data['grace_start']);
        $data['grace_end'] = empty($data['grace_end']) ? null : $this->parseDate($data['grace_end']);

        $add = Lease::create($data);
        if (!$add) {
            return 'error';
        }
        return 'success';
    }

    // import leases
    public function import(){
        return view('lease.upload');
    }

    public function storeimport(Request $request){
        //dd($request->all());
        if ($request->hasFile('upload-file')){
            $path = $request->file('upload-file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();
            
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                   
                    $leases = new Lease();
                    $leases->certificate_ids= $value->certificate_ids;
                    $leases->property_ids= $value->property_ids;
                    $leases->lessor= $value->lessor;
                    $leases->lessor_pkp= $value->lessor_pkp;
                    $leases->tenant= $value->tenant;
                    $leases->purpose= $value->purpose;
                    $leases->start= $value->start;
                    $leases->end= $value->end;
                    $leases->note= $value->note;
                    $leases->lease_deed= $value->lease_deed;
                    $leases->lease_deed_date= $value->lease_deed_date;
                    $leases->payment_terms= $value->payment_terms;
                    $leases->payment_history= $value->payment_history;
                    $leases->payment_invoices= $value->payment_invoices;
                    $leases->sell_monthly= $value->sell_monthly;
                    $leases->sell_yearly= $value->sell_yearly;
                    $leases->rent_m2_monthly= $value->rent_m2_monthly;
                    $leases->rent_m2_monthly_type= $value->rent_m2_monthly_type;
                    $leases->rent_price= $value->rent_price;
                    $leases->rent_price_type= $value->rent_price_type;
                    $leases->rent_assurance= $value->rent_assurance;
                    $leases->brok_name= $value->brok_name;
                    $leases->brok_fee_yearly= $value->brok_fee_yearly;
                    $leases->brok_fee_paid= $value->brok_fee_paid;
                    $leases->grace_start= $value->grace_start;
                    $leases->grace_end= $value->grace_end;
                    $leases->save();
                }
            }
        }   
        return back();
    }



    private function parseDate($str, $format = 'Y-m-d'){
        return Carbon::parse($str)->format($format);
    }
}
