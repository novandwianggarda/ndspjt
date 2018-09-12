<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tax;
use App\Http\Requests\TaxRequest;
use Maatwebsite\Excel\Facades\Excel;

class TaxesController extends Controller
{
    /**
     * show all taxes
     * as a table
     */
    public function index()
    {
        $taxes = Tax::all();
        return view('tax.table')->with('taxes', $taxes);
    }

    /**
     * show tax
     */
    public function show($id)
    {
        $tax = Tax::find($id);
        return view('tax.show')->with('tax', $tax);
    }


    //import taxes

    public function import(){
        return view('tax.upload');
    }

    public function storeimport(Request $request){
        //dd($request->all());
        if ($request->hasFile('upload-file')){
            $path = $request->file('upload-file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();
            return view('tax.showdata')->with('data', $data);
            
            
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    // dd(\App\TaxType::where('short_name', strtolower($value->tax_type))->first());
                    $taxTypeId = \App\TaxType::where('short_name', strtolower($value->tax_type))->first()->id;
                   
                    $taxes = new Tax();
                    $taxes->tax_type_id= $taxTypeId;
                    $taxes->certificate_ids= $value->certificate_ids;
                    $taxes->nop= $value->nop;
                    $taxes->owner= $value->owner;
                    $taxes->year= $value->year;
                    $taxes->due_date= $value->due_date;
                    $taxes->due_date_ly= $value->due_date_ly;
                    $taxes->note= $value->note;
                    $taxes->addr_address= $value->addr_address;
                    $taxes->addr_village= $value->addr_village;
                    $taxes->addr_land_area= $value->addr_land_area;
                    $taxes->addr_building_area= $value->addr_building_area;
                    $taxes->njop_land= $value->njop_land;  
                    $taxes->njop_building= $value->njop_building;
                    $taxes->njop_total= $value->njop_total;
                    $taxes->corp_name= $value->corp_name;
                    $taxes->corp_payment_method= $value->corp_payment_method;
                    $taxes->folder_number= $value->folder_number;
                    $taxes->folder_current= $value->folder_current;
                    $taxes->folder_plan= $value->folder_plan;
                    $taxes->save();
                    \Session::flash('success','File Imported Succesfully. ');
                }
            }
        }else{
            \Session::flash('warnning', 'There is no file to Import');
        }    
        return back();
    }


    public function tes(Request $request)
    {
        // $x = json_decode($request->data);
        // foreach ($x as $d) {
        //     echo $d->property_type;
        // }

        $x = json_decode($request->data);
        foreach ($x as $d => $value) {

            $taxTypeId = \App\TaxType::where('short_name', strtolower($value->tax_type))->first()->id;
                   
                    $taxes = new Tax();
                    $taxes->tax_type_id= $taxTypeId;
                    $taxes->certificate_ids= $value->certificate_ids;
                    $taxes->nop= $value->nop;
                    $taxes->owner= $value->owner;
                    $taxes->year= $value->year;
                    $taxes->due_date = date('Y-m-d', strtotime($taxes->due_date));
                    $taxes->due_date_ly = date('Y-m-d', strtotime($taxes->due_date_ly));

                    $taxes->note= $value->note;
                    $taxes->addr_address= $value->addr_address;
                    $taxes->addr_village= $value->addr_village;
                    $taxes->addr_land_area= $value->addr_land_area;
                    $taxes->addr_building_area= $value->addr_building_area;
                    $taxes->njop_land= $value->njop_land;  
                    $taxes->njop_building= $value->njop_building;
                    $taxes->njop_total= $value->njop_total;
                    $taxes->corp_name= $value->corp_name;
                    $taxes->corp_payment_method= $value->corp_payment_method;
                    $taxes->folder_number= $value->folder_number;
                    $taxes->folder_current= $value->folder_current;
                    $taxes->folder_plan= $value->folder_plan;
                    $taxes->save();
        }

        return redirect()->route('dashboard');

    }




    /**
     * show add new tax form
     */
    public function showAddForm()
    {
        return view('tax.add');
    }
    //ini buat add nya :)
    public function store(TaxRequest $request)
    {
        $data = $request->all();
        $add = tax::create($data);
        if (!$add) {
            return 'error';
        }
        return 'succes';
    }
}