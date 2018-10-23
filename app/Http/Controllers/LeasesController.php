<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lease;
use App\Certificate;
use App\Http\Requests\LeaseRequet;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use DB;

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
            return view('lease.showdata')->with('data', $data);
        }   
        return back();
    }

    


    public function tes(Request $request)
    {
        $x = json_decode($request->data);
        foreach ($x as $d => $value) {
            $leas = new Lease();
                
                $leas->tenant= $value->tenant;
                $leas->start = date('Y-m-d', strtotime($leas->start));
                $leas->end = date('Y-m-d', strtotime($leas->end));
                $leas->note= $value->note;
                $leas->brok_name= $value->brok_name;
                $leas->rent_assurance= $value->rent_assurance;

                $leas->purpose= $value->purpose;
                $leas->lease_deed= $value->lease_deed;
                $leas->lease_deed_date= $value->lease_deed_date;
                $leas->payment_terms= $value->payment_terms;
                $leas->payment_histoty= $value->payment_histoty;
                $leas->payment_invoice= $value->payment_invoice;
                $leas->sell_monthly= $value->sell_monthly;
                $leas->sell_yearly= $value->sell_yearly;

                //rent
                $leas->rent_m2_monthly= $value->rent_m2_monthly;
                $leas->rent_m2_monthly_type= $value->rent_m2_monthly_type;
                $leas->rent_price= $value->rent_price;
                $leas->rent_price_type= $value->rent_price_type;
                //perantara
                $leas->brok_name= $value->brok_name;
                $leas->brok_fee_yearly= $value->brok_fee_yearly;
                $leas->brok_fee_paid= $value->brok_fee_paid;
                //
                $leas->grace_start= $value->grace_start;
                $leas->grace_end= $value->grace_end;
                $leas->save();
        }
        return redirect()->route('dashboard');
    }






    public function storeimport1(Request $request){
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
    public function eksport(){
        $leases = Lease::all();
        return view('lease.eksport')->with('leases', $leases);
    }

    public function eksported(){
        //dd($request->all());
        $lease_data = DB::table('leases')->get()->toArray();  
        $lease_array[] = array('Leassor', 'Lessor PKP', 'Purposes', 'Start', 'End', 'Note', 'Lease Deed', 'Lease Deed Date', 'Payment Terms', 'Payment History', 'Payment Invoices', 'Sell Monthly', 'Sell Yearly', 'Rent m2 Monthly', 'Rent m2 Monthly Type', 'Rent Price', 'Rent price Type', 'Rent Assurance', 'Brok Name', 'Brok Fee Yearly', 'Brok Fee Paid', 'Grace Start', 'Grace End',);

        foreach ($lease_data as $leasess) 
        {
            $lease_array[] = array(
                'Lessor' => $leasess->lessor, 
                'Lessor PKP' => $leasess->lessor_pkp, 
                'Tenan' => $leasess->tenant, 'Purposes' => $leasess->tenant, 'Start' => $leasess->start, 'End' => $leasess->end, 'Note' => $leasess->note, 'Lease Deed' => $leasess->lease_deed, 'Lease Deed Date' => $leasess->lease_deed_date, 'Payment Terms' => $leasess->payment_terms, 'Payment History' => $leasess->payment_history, 'Payment Invoices' => $leasess->payment_invoices, 'Sell Monthly' => $leasess->sell_monthly, 'Sell Yearly' => $leasess->sell_yearly, 'Rent m2 Monthly' => $leasess->rent_m2_monthly, 'Rent m2 Monthly Type' => $leasess->rent_m2_monthly_type, 'Rent Price' => $leasess->rent_price, 'Rent price Type' => $leasess->rent_price_type, 'Rent Assurance' => $leasess->rent_assurance, 'Brok Name' => $leasess->brok_name, 'Brok Fee Yearly' => $leasess->brok_fee_yearly, 'Brok Fee Paid' => $leasess->brok_fee_paid, 'Grace Start' => $leasess->grace_start, 'Grace End' => $leasess->grace_end,
            );
        }
        Excel::create('Lease', function($excel) use (
            $lease_array){
            $excel->setTitle('Lease');
            $excel->sheet('Lease', function($sheet)
                use($lease_array){
                    $sheet->fromArray($lease_array, null, 'A1', false, false);
                });
        })->download('xlsx');
    }





    private function parseDate($str, $format = 'Y-m-d'){
        return Carbon::parse($str)->format($format);
    }
}
