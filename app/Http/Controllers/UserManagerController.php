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
    public function store(Request $request){
    	
        //dd($request->all());
        $user = new User();
        $user->name=$request->input('name');
        $user->username=$request->input('username');
        $user->password=$user->password=$request->input('password')!=''?bcrypt($request->input('password')):'';
        $user->save();
        

        // if($user->save()){
        //     $kategori='success';
        //     $pesan="Tersimpan";
        // }else{
        //     $kategori='error';
        //     $pesan="Gagal";
        // }
        return redirect()->back()->with('data', ['some kind of data']);




    }
}
