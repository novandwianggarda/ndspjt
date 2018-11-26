<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lease;
use App\Certificate;
use App\Property;
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
        // parse to int
        // $data['brok_fee_yearly'] = (int)$data['brok_fee_yearly'];
        // $data['brok_fee_paid'] = (int)$data['brok_fee_paid'];
        // parse to date
        $data['due_date'] = empty($data['due_date']) ? null : $this->parseDate($data['due_date']);
        $data['start'] = empty($data['start']) ? null : $this->parseDate($data['start']);
        $data['end'] = empty($data['end']) ? null : $this->parseDate($data['end']);
        $data['grace_start'] = empty($data['grace_start']) ? null : $this->parseDate($data['grace_start']);
        $data['grace_end'] = empty($data['grace_end']) ? null : $this->parseDate($data['grace_end']);
        // dd($data);

        $add = Lease::create($data);
        if (!$add) {
            return 'error';
        }
        \LogActivity::addToLog('tambah new Lease');

        return redirect()->route('lease');
    }

    public function print($id)
    {
        $lease=Lease::find($id);
        $now = date_create()->format('d-m-Y');
        $payment_invoices = json_decode($lease->payment_invoices);
        return view('lease.invoice', compact('lease', 'now', 'payment_invoices'));
    }

    public function edit($id)
    {
        $lease=Lease::find($id);
        $payment_history = json_decode($lease->payment_history);
        $payment_invoices = json_decode($lease->payment_invoices);
        $payment_terms = json_decode($lease->payment_terms);

        return view('lease.edit', compact('lease', 'payment_history', 'payment_invoices', 'payment_terms'));
    }

    public function updatelease(Request $request, $id)
    {
        $data = Lease::find($id);
        // parse to date
        $data['due_date'] = empty($data['due_date']) ? null : $this->parseDate($data['due_date']);
        $data['start'] = empty($data['start']) ? null : $this->parseDate($data['start']);
        $data['end'] = empty($data['end']) ? null : $this->parseDate($data['end']);
        $data['grace_start'] = empty($data['grace_start']) ? null : $this->parseDate($data['grace_start']);
        $data['grace_end'] = empty($data['grace_end']) ? null : $this->parseDate($data['grace_end']);
        // dd($data);

       $dataUpdate = $request->only([
        'lessor', 'lessor_pkp',
        'tenant', 'purpose', 'start', 'end', 'note', 'lease_deed_date', 'lease_number', 'lease_deed',
        'payment_terms', 'payment_history', 'payment_invoices', 'sell_monthly', 'sell_yearly', 'rent_m2_monthly', 'rent_m2_monthly_type', 'rent_price', 'rent_price_type', 'rent_assurance', 'brok_name', 'brok_fee_yearly', 'brok_fee_paid', 'grace_start', 'due_date', 'balance', 'grace_end']);
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
        //dd($request->all());
        $x = json_decode($request->data);
        foreach ($x as $d => $value) {
            $leas = new Lease();
            $leas->lessor= @$value->lessor;
            $leas->lessor_pkp= @$value->lessor_pkp;
            $leas->pic= @$value->pic;
            $leas->tenant= @$value->tenant;
            $leas->purpose= @$value->purpose;
            $leas->grace_start= @$value->grace_start->date;
            $leas->grace_end= @$value->grace_end->date;

            $leas->start= @$value->start->date;
            $leas->end= @$value->end->date;
            $leas->rent_price= $value->rent_price;

            $leas->rent_assurance= @$value->rent_assurance;
            $leas->note= @$value->note;
            $leas->lease_number= @$value->lease_number;

            $leas->brok_name= @$value->brok_name;
            $leas->brok_fee_yearly= @$value->brok_fee_yearly;
            $leas->lease_deed= @$value->lease_deed;
            $leas->brok_fee_paid= @$value->brok_fee_paid;
            $leas->lease_deed_date= @$value->lease_deed_date->date;
            $leas->due_date= @$value->due_date->date;
            

            $leas->payment_terms= json_encode([Array(
                "total" => @$value->payment_terms,
                "due_date" => @$value->due_date->date,
                "note" => @$value->notes,
            )]);

            $leas->payment_invoices= json_encode([Array(
                "total" => @$value->totsew,
                "paid_date" => @$value->due_date->date,
                "note" => @$value->note,
            )]);
            $leas->payment_history= json_encode([Array(
                "total" => @$value->total_inv,
                "paid_date" => @$value->due_date->date,
                "note" => @$value->note_payinv,
            )]);
            $leas->save();


            $certificate_type= $value->certificate_type;
            if($certificate_type){
                $certTypeId = \App\CertificateType::where('short_name', $certificate_type)->get()->first()->id;
                $cert = new Certificate();
                $no_hm_hgb = $value->no_hm_hgb;
                $kota = $value->kota;
                $nama_sertifikat = $value->nama_sertifikat;
                $kelurahann = $value->kelurahann;
                $certificate_type_id= $certTypeId;
                if($no_hm_hgb){
                    $cert = Certificate::firstOrCreate(['no_hm_hgb' => $no_hm_hgb, 'kota' => $kota,
                        'kelurahann' => $kelurahann, 'certificate_type_id' => $certificate_type_id, 'nama_sertifikat' => $nama_sertifikat]);
                }else{
                    $cert->save();
                }
            }



            $property_type = $value->property_type;
            if ($property_type){
                $propTypeId = \App\PropertyType::where('name', $property_type)->get()->first()->id;

                $prop = new Property();
                
                $name = $value->name; 
                $block = $value->block;
                $floor = $value->floor;
                $electricity = $value->electricity;
                $block = $value->block;
                $address = $value->address;
                $water = $value->water;
                $telephone = $value->telephone;
                $building_area = $value->building_area;
                $land_area = $value->land_area;
                
                $property_type_id = $propTypeId;
                if ($name) {
                    $prop = Property::firstOrCreate(['name' => $name, 'address' => $address,
                        'land_area' => $land_area, 'block' => $block, 'electricity' => $electricity, 'water' => $water, 'floor' => $floor, 'telephone' => $telephone, 'property_type_id' => $property_type_id, 'building_area' => $building_area
                    ]);
                } else {
                    $prop->save();
                }
            }

            \DB::table('leases')
                ->where('id', $leas->id)
                ->update(['certificate_ids' => $cert->id, 'property_ids' => $prop->id
            ]);

        \LogActivity::addToLog('Import dan update Lease');



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
