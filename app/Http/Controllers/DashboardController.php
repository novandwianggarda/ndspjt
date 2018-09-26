<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lease;
use App\Certificate;

class DashboardController extends Controller
{
    /**
     * show the application dashboard.
     */
    public function index()
    {
        $leases = Lease::all();
        return view('dashboard', compact('leases'));
    }

    /**
     * show user profile
     */
    public function showUserProfile()
    {
        return view('user.profile');
    }
}
