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
        $payment_history = json_decode($lease->payment_history);
        $payment_invoices = json_decode($lease->payment_invoices);
        $payment_terms = json_decode($lease->payment_terms);
        
        return view('lease.show', compact('lease', 'payment_history', 'payment_invoices', 'payment_terms'));
        // view('your-view')->with('leads', json_decode($leads, true));
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
        // dd($data);
        // parse to int
        // $data['brok_fee_yearly'] = (int)$data['brok_fee_yearly'];
        // $data['brok_fee_paid'] = (int)$data['brok_fee_paid'];
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

    public function print($id)
    {
        $lease=Lease::find($id);
        return view('lease.invoice', compact('lease'));
    }

    public function edit($id)
    {
        $lease=Lease::find($id);
        return view('lease.edit', compact('lease'));
    }

    public function updatelease(Request $request, $id)
    {
        // dd($request->all());
        $data = Lease::find($id);
        $data->lessor = $request->input('lessor');
        $data->lessor_pkp = $request->input('lessor_pkp');
        $data->tenant = $request->input('tenant');
        $data->purpose = $request->input('purpose');
        $data->start = $request->input('start');

        $data->end = $request->input('end');
        $data->note = $request->input('note');
        $data->lease_deed = $request->input('lease_deed');
        $data->lease_number = $request->input('lease_number');
        $data->lease_deed_date = $request->input('lease_deed_date');
        $data->payment_terms = $request->input('payment_terms');
        $data->payment_history = $request->input('payment_history');
        $data->payment_invoices = $request->input('payment_invoices');
        $data->sell_monthly = $request->input('sell_monthly');
        $data->sell_yearly = $request->input('sell_yearly');
        $data->rent_m2_monthly = $request->input('rent_m2_monthly');
        $data->rent_m2_monthly_type = $request->input('rent_m2_monthly_type');
        $data->rent_price = $request->input('rent_price');
        $data->rent_price_type = $request->input('rent_price_type');
        $data->rent_assurance = $request->input('rent_assurance');
        $data->brok_name = $request->input('brok_name');
        $data->brok_fee_yearly = $request->input('brok_fee_yearly');
        $data->brok_fee_paid = $request->input('brok_fee_paid');
        $data->grace_start = $request->input('grace_start');
        $data->grace_end = $request->input('grace_end');

        $dataUpdate = $request->only([
        'certificate_ids', 'property_ids', 'lessor', 'lessor_pkp',
        'tenant', 'purpose', 'start', 'end', 'note', 'lease_deed_date', 'lease_number', 'lease_deed',
        'payment_terms', 'payment_history', 'payment_invoices', 'sell_monthly', 'sell_yearly', 'rent_m2_monthly', 'rent_m2_monthly_type', 'rent_price', 'rent_price_type', 'rent_assurance', 'brok_name', 'brok_fee_yearly', 'brok_fee_paid', 'grace_start', 'grace_end']);
        $data->update($dataUpdate);
        return redirect()->route('lease');

    } 


    public function destroy($id)
    {
        $le=Lease::find($id);
        $le->delete();
        return redirect()->route('lease');
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
        // dd($request->all());
        $x = json_decode($request->data);
        foreach ($x as $d => $value) {
            $address = $value->address;
            $no_hm = $value->no_hm;

            if($address){

                $propId = \App\Property::where('address', $address)->get()->first()->id;
                $no_hm = \App\Certificate::where('no_hm_hgb', $no_hm)->get()->first()->id;
                
                $leas = new Lease();
                $leas->property_ids= $propId;
                $leas->certificate_ids= $no_hm;
                $leas->lessor= $value->lessor;
                $leas->lessor_pkp= $value->lessor_pkp;
                $leas->pic= $value->pic;
                $leas->tenant= $value->tenant;
                $leas->purpose= $value->purpose;
                $leas->grace_start= $value->grace_start;
                $leas->grace_end= $value->grace_end;
                $leas->start= $value->start->date;
                $leas->end= $value->end->date;
                $leas->rent_price= $value->rent_price;


                $leas->rent_assurance= $value->rent_assurance;
                $leas->note= $value->note;
                $leas->lease_number= $value->lease_number;

                $leas->brok_name= $value->brok_name;
                $leas->brok_fee_yearly= $value->brok_fee_yearly;
                $leas->lease_deed= $value->lease_deed;
                $leas->brok_fee_paid= $value->brok_fee_paid;
                $leas->lease_deed_date= @$value->lease_deed_date->date;

                $leas->payment_terms= json_encode([Array(
                                    "total" => @$value->payment_terms,
                                    "due_date" => @$value->du_datepbb->date,
                                    "note" => @$value->notes,
                                )]);

                $leas->payment_invoices= json_encode([Array(
                                    "total" => @$value->total_inv,
                                    "paid_date" => @$value->payment_invoices->date,
                                    "note" => @$value->note_payinv,
                                )]);
                $leas->payment_history= json_encode([Array(
                                    "total" => @$value->total_inv,
                                    "paid_date" => @$value->payment_invoices->date,
                                    "note" => @$value->note_payinv,
                                )]);

                $leas->save();
            }
        }
        return redirect()->route('lease');
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
