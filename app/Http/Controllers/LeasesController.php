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
use PDF;


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

    public function todolist()
    {
        // $leases = Lease::whereDate('due_date', '<', Carbon::now())
        // ->orderBy('due_date', 'Asc')->paginate(100);

        // $leasess = Lease::whereDate('due_date', '>', Carbon::now())
        // ->orderBy('due_date', 'Asc')->paginate(100);
        $leasess = Lease::dueForToday();
        $leasesinv = Lease::dueForTodayinv();
        $leaseshist = Lease::dueForTodayhist();
        // $leasess = json_decode($today);

        // dd($leasess);
        $leaseyest = Lease::dueForYesterday();
        // $leaseyest = json_decode($yest);

        return view('lease.todolist', compact('leasess', 'leaseyest', 'leasesinv', 'leaseshist'));
    }


    public function drafts()
    {
        // dd($leasess);
        $leasess = Lease::all();


        return view('lease.drafts', compact('leasess'));
    }
    

    /**
     * show lease
     */
    public function show($id)
    {
        $lease = Lease::find($id);

        //payterm
        // $payment_teerm = json_decode($lease->payment_terms);
        $payterm = json_encode($lease->payment_terms);
        $payment_teerm = json_decode($payterm);

        //payinv
        // $payment_invoice = json_decode($lease->payment_invoices);
        $payinv = json_encode($lease->payment_invoices);
        $payment_invoice = json_decode($payinv);

        //history
        // $payment_hist = json_decode($lease->payment_history);
        $paymenthist = json_encode($lease->payment_history);
        $payment_hist = json_decode($paymenthist);

        // $payment_history = json_encode($payment_history);
        
        return view('lease.show', compact('lease', 'payment_hist', 'payment_invoice', 'payment_teerm'));
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
        // $data = json_decode($request->payment_terms);
        $data['payment_terms'] = json_decode($data['payment_terms']);
        $data['payment_history'] = json_decode($data['payment_history']);
        $data['payment_invoices'] = json_decode($data['payment_invoices']);
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


        $paymen = json_encode($lease->payment_terms);
        $payterm = json_decode($paymen);

        return view('lease.invoice', compact('lease', 'now', 'payterm'));
    }


     public function printpdf($id)
    {
        $lease=Lease::find($id);
        $pdf = PDF::loadView('lease.pdf', $lease);

        // return $pdf->download('invoice.pdf');
        return $pdf->download('lease.invoice', compact('lease'));
    }


    public function transpose($id)
    {
        $lease = Lease::find($id);
        $payterm = json_encode($lease->payment_terms);
        $payment_teerm = json_decode($payterm);
        $payinv = json_encode($lease->payment_invoices);
        $payment_invoice = json_decode($payinv);
        $paymenthist = json_encode($lease->payment_history);
        $payment_hist = json_decode($paymenthist);
        return view('lease.transpose', compact('lease', 'payment_hist', 'payment_invoice', 'payment_teerm'));
        // view('your-view')->with('leads', json_decode($leads, true));
    }

    

    public function edit($id)
    {
        $lease=Lease::find($id);

        //payterm
        // $payment_teerm = array($lease->payment_terms);

        //payinv
        // $payment_invoice = array($lease->payment_invoices);

        //history
        // $payment_hist = array($lease->payment_history);

        return view('lease.edit', compact('lease'));
    }

    // public function updatelease(LeaseRequet $request, $id)
    // {
    //     $data = Lease::find($id);
    //     $dataUpdate = $request->only([
    //     'lessor', 'lessor_pkp',
    //     'tenant', 'purpose', 'start', 'end', 'note', 'lease_deed_date', 'lease_number', 'lease_deed',
    //     'payment_terms', 'payment_history', 'payment_invoices', 'sell_monthly', 'sell_yearly', 'pic', 'rent_m2_monthly', 'rent_m2_monthly_type', 'rent_price', 'rent_price_type', 'rent_assurance', 'brok_name', 'brok_fee_yearly', 'brok_fee_paid', 'grace_start', 'grace_end']);
    //     dd($dataUpdate);

    //     $dataUpdate['payment_terms'] = json_decode($dataUpdate['payment_terms']);
    //     $dataUpdate['payment_history'] = json_decode($dataUpdate['payment_history']);
    //     $dataUpdate['payment_invoices'] = json_decode($dataUpdate['payment_invoices']);

    //     $data->update($dataUpdate);

    //     return redirect()->route('lease');
    // }




    public function updatemodal(LeaseRequet $request)
    {
        $leases = Lease::find($request->id);
        $leases->status = $request->status;
        $leases->save();
        // \LogActivity::addToLog('update status Lease Lessor');

        // dd($leases);
        return redirect()->back();
    }


    // public function updatemodal(Request $request)
    // {
    //     $leases = Lease::findOrFail($request->id);
    //     $leasesUpdate = $request->all();
    //     dd($leasesUpdate);
    //     $leases->update($leasesUpdate);
    //     return redirect()->route('lease');
    // }




    public function updatelease(LeaseRequet $request, $id)
    {
        $data = Lease::find($id);
       // dd($request->payment_terms);

        $dataUpdate = $request->all();
        // dd($dataUpdate);

        $dataUpdate['payment_terms'] = json_decode($dataUpdate['payment_terms']);
        $dataUpdate['payment_history'] = json_decode($dataUpdate['payment_history']);
        $dataUpdate['payment_invoices'] = json_decode($dataUpdate['payment_invoices']);

        $data->update($dataUpdate);
        \LogActivity::addToLog('Update data Lease');

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
        \LogActivity::addToLog('Import Lease');

        return back();
    }
    
    public function tes(Request $request)
    {
        //dd($request->all());
        $x = json_decode($request->data);
        // $x = $request->data;
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

            $leas->payment_terms= [[
                "total" => @$value->payment_terms,
                "due_date" => @$value->due_date->date,
                "note" => @$value->notes,
            ]];

            $leas->payment_invoices= [[
                "total" => @$value->totsew,
                "paid_date" => @$value->due_date->date,
                "note" => @$value->notes,
            ]];
            $leas->payment_history= [[
                "total" => @$value->total_inv,
                "paid_date" => @$value->due_date->date,
                "note" => @$value->note_payinv,
            ]];
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
                'Tenan' => $leasess->tenant, 'Purposes' => $leasess->purposes, 'Start' => $leasess->start, 'End' => $leasess->end, 'Note' => $leasess->note, 'Lease Deed' => $leasess->lease_deed, 'Lease Deed Date' => $leasess->lease_deed_date, 'Payment Terms' => $leasess->payment_terms, 'Payment History' => $leasess->payment_history, 'Payment Invoices' => $leasess->payment_invoices, 'Sell Monthly' => $leasess->sell_monthly, 'Sell Yearly' => $leasess->sell_yearly, 'Rent m2 Monthly' => $leasess->rent_m2_monthly, 'Rent m2 Monthly Type' => $leasess->rent_m2_monthly_type, 'Rent Price' => $leasess->rent_price, 'Rent price Type' => $leasess->rent_price_type, 'Rent Assurance' => $leasess->rent_assurance, 'Brok Name' => $leasess->brok_name, 'Brok Fee Yearly' => $leasess->brok_fee_yearly, 'Brok Fee Paid' => $leasess->brok_fee_paid, 'Grace Start' => $leasess->grace_start, 'Grace End' => $leasess->grace_end,
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



    public function eksportedleases($id)
    {
        $data = Lease::where('id', $id)->get();
        // $data = Lease::find($id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // print_r($data->first()->payment_terms[0]['total']);
        // exit;

        $payterm = ($data->first()->payment_terms[0]['total']);

        // foreach ($payment_teerm as $key => $mydata) {
        //     $tagihan = $mydata->total;
        // }

        $filename = "Transpose.csv";
        $handle = fopen($filename, 'w+');



        fputcsv($handle, array('Sertifikat','No Hm Hgb', 'Kota', 'Kecamatan', 'Kepemilikan', 'Nama Area', 'Alamat', 'Listrik', 'Air', 'Area', 'Block', 'Penawaran /bln', 'Penawaran /Thn', 'lessor', 'lessor pkp', 'Tenant', 'Purposes', 'PIC',
        'Nama Notaris', 'No Akta Sewa', 'Tgl Sewa', 'Grace Awal', 'Grace Akhir', 'Awal Sewa', 'Akhir Sewa', 'Sewa Per Tahun (DPP)', 'Payment Term', 'Nama Broker', 'Fee Per Tahun', 'Jaminan', 'note'));
        foreach ($data as $lease)
        {
            fputcsv($handle, array($lease->cert->nama_sertifikat, $lease->cert->no_hm_hgb, $lease->cert->kota, $lease->cert->kecamatan, $lease->cert->kepemilikan, $lease->prop->name, $lease->prop->address, $lease->prop->electricity, $lease->prop->water, $lease->prop->land_area, $lease->prop->block, $lease->sell_monthly, $lease->sell_yearly, $lease->lessor, 
                $lease->lessor_pkp, $lease->tenant, $lease->purpose, $lease->pic,
                $lease->lease_deed, $lease->lease_number, $lease->lease_deed_date, $lease->grace_start, $lease->grace_end, $lease->start, $lease->end, $lease->rent_price, $payterm, 
                $lease->brok_name, $lease->brok_fee_yearly, $lease->rent_assurance,
                 $lease->note ));
        }
        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return \Response::download($filename, 'Transpose.csv', $headers);
    }







    private function parseDate($str, $format = 'Y-m-d'){
        return Carbon::parse($str)->format($format);
    }

}
