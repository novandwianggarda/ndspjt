<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagerController extends Controller
{
    public function index()
    {
		return view('admin.user_manager');    	
    }
}