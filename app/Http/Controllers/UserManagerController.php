<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
class UserManagerController extends Controller
{
    public function index()
    {
    	$users=User::all();
		return view('admin.user_manager')->with('users', $users);    	
    }
     public function ShowAddUser()
    {
        $roles = Role::all()->pluck('name', 'id');
    	return view('admin.add_user', compact('roles'));
    }
    public function store(Request $request){
    	
        //dd($request->all());
        $user = new User();
        $user->name=$request->input('name');
        $user->username=$request->input('username');
        $user->password=$user->password=$request->input('password')!=''?bcrypt($request->input('password')):'';

        $user->save();
        $user->roles()->attach($request->input('role_id'));

        // if($user->save()){
        //     $kategori='success';
        //     $pesan="Tersimpan";
        // }else{
        //     $kategori='error';
        //     $pesan="Gagal";
        // }
        return redirect()->back()->with('data', ['some kind of data']);
    }

    public function edit($id)
    {
        $users = User::find($id);
        $roles = Role::all()->pluck('name', 'id');
        return view('admin.edit', compact('users', 'roles'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());


        $this->validate($request, [
            'name'=>'Required',
            'username'=>'Required',

            'role_id'=>'Required',
            'password'=>'Required'
        ]);

        $user = User::find($id)->user;
        $userUpdate = $request->only(['name', 'username', 'role_id', 'password']);
        $userUpdate['password'] = $request->input('password')!=''?bcrypt($request->input('password')):'';
        $user->update($userUpdate);
        return redirect()->back()->with('data', ['some kind of data']);

    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->back()->with('data', ['some kind of data']);
    }



}
