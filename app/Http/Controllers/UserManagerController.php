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
     public function ShowAddUser()
    {
    	   return view('admin.add_user');
    }
    public function store(add_userRequest $request){
    	$data = $request->all();
    	$add = add_user::add($data);
    	if (!$add) {
    		return 'error';
    	}
    	return 'success';
    }
}
