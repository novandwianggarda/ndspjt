<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertiController extends Controller
{
    //show add properti
    public function showAddForm(){
    	return view('properti.add');
    }
}
