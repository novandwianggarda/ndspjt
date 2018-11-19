<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lease;
use App\Certificate;
use App\User;
use App\Tax;

class DashboardController extends Controller
{
    /**
     * show the application dashboard.
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {


    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function myTestAddToLog()
    {
        \LogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // 
    // public function logActivity()
    // {
    //     $logs = \LogActivity::logActivityLists();
    //     return view('logActivity',compact('logs'));
    // }


    public function logActivity()
    {
        $logs = \LogActivity::logActivityLists();
        // $logs = Lease::orderBy('end', 'Desc')->paginate(4);

        return view('user.logtoday',compact('logs'));
    }







    
    public function index()
    {
        $leases = Lease::orderBy('end', 'Desc')->paginate(4);
        $taxes = Tax::orderBy('duedates', 'Desc')->paginate(4);
        return view('dashboard', compact('leases', 'taxes'));
    }

    // public function log()
    // {
    //     $users = User::all();
    //     return view('user.logtoday', compact('users'));
    // }





    /**
     * show user profile
     */
    public function showUserProfile()
    {
        return view('user.profile');
    }
}
