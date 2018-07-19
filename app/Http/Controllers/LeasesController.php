<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lease;
use App\Certificate;
use App\Http\Requests\LeaseRequet;

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
        dd($request->all());
    }

}
