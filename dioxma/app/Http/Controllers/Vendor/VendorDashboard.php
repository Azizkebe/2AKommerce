<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VendorDashboard extends Controller
{
    public function index()
    {
        return view('dashboard.vendors.home');
    }

    public function deconnexion()
    {
        Auth::guard('vendor')->logout();
        return redirect()->route('vendor.handlogin');
    }
}
