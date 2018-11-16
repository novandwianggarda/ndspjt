<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lease;
use App\Certificate;
use App\Tax;

class DashboardController extends Controller
{
    /**
     * show the application dashboard.
     */
    public function index()
    {
        $leases = Lease::orderBy('end', 'Desc')->paginate(4);
        $taxes = Tax::orderBy('duedates', 'Desc')->paginate(4);
        return view('dashboard', compact('leases', 'taxes'));
    }

    /**
     * show user profile
     */
    public function showUserProfile()
    {
        return view('user.profile');
    }
}
