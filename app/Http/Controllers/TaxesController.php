<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tax;

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

    /**
     * show add new tax form
     */
    public function showAddForm()
    {
        return view('tax.add');
    }
}
