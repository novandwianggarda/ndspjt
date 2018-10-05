<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperController extends Controller
{
	/**
		* Create a new controller instance
		*
		* @return void
	*/
	public function __construct()
	{
		$this->middleware('auth:super');
		$this->middleware('super');
	}

    public function index()
    {
		return view('super.profil');    	
    }
}
