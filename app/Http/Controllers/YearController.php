<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tax;
use App\Year;
use App\Certificate;
use App\Http\Requests\TaxRequest;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class YearController extends Controller
{
    /**
     * show all taxes
     * as a table
     */
    public function index()
    {
        $i=1;
        $years = Year::all();
        return view('tax.year.2018.table', compact('years', 'i'));
    }


    public function add2018()
    {
        $certificates = Certificate::all();
        $taxs = Tax::all()->pluck('nop', 'id');
        return view('tax.year.2018.year', compact('taxs', 'certificates'));
    }

    public function store2018(Request $request)
    {
        $t = new Year();
        
        $t->year = $request->input('year');
        $t->njop_land = $request->input('njop_land');
        $t->njop_building = $request->input('njop_building');
        $t->njop_total = $request->input('njop_total');

        $t->ptkp = $request->input('ptkp');
        $t->stimulus = $request->input('stimulus');
        $t->pbbygdbyr = $request->input('pbbygdbyr');
        $t->certificate_ids=$request->input('certificate_ids');
        $t->tax_ids=$request->input('tax_ids');
        $t->save();
        return redirect()->route('2018');
    }

    public function destroy2018($id)
    {
        $year = Year::find($id);
        $year->delete();
        return redirect()->route('2018');
    }

     public function show2018($id)
    {
        $year = Year::find($id);
        return view('tax.year.2018.show', compact('year'));
    }

}