<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lease;
use App\Certificate;
use App\Http\Requests\LeaseRequet;
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
        dd($data);
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

    private function parseDate($str, $format = 'Y-m-d'){
        return Carbon::parse($str)->format($format);
    }
}
