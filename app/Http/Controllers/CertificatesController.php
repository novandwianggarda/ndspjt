<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;
use App\Http\Requests\CertificateRequest;

class CertificatesController extends Controller
{

    /**
     * show all certificates
     * as a table
     */
    public function index()
    {
        $certificates = Certificate::all();
        return view('certificate.table')->with('certificates', $certificates);
    }

    /**
     * show certificate
     */
    public function show($id)
    {
        $cert = Certificate::find($id);
        return view('certificate.show')->with('certificate', $cert);
    }

    /**
     * show add new certificate form
     */
    public function showAddForm()
    {
        return view('certificate.add');
    }

    public function store(CertificateRequest $request)
    {
        $data = $request->all();
        $add = Certificate::create($data);
        if (!$add) {
            return 'error';
        }
        return 'success';
    }

    
}
