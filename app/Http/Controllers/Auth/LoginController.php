<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthenticatesUsers;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    // public function login(Request $request)
    // {
    //     $credentials = $request->only('username', 'password');

    //     if (auth()->attempt($credentials)) {
    //         if (Auth::role_user()->users->slug =='superadmin') {
    //             return redirect('/dashboard');
    //         }elseif (Auth::role_user()->users->slug =='administrator'){
    //             return redirect('/admin');
    //         }else{
    //             return redirect('/home');
    //         }
    //     }else{
            
    //         return redirect('/login');
    //     }
    // }



}
