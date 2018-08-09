<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserManagerController extends Controller
{
    public function index()
    {
    	$users=User::all();
		return view('admin.user_manager')->with('users', $users);    	
    }
}
