<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Vendor;
use App\Http\Requests\HandRegisterVendorRequest;
use App\Http\Requests\HandLoginVendorRequest;

class VendorAuthController extends Controller
{
    public function login()
    {
        return view('auth.vendor.login');
    }
    public function register()
    {
        return view('auth.vendor.register');
    }
    public function handregister(HandRegisterVendorRequest $request)
    {

        try {

            Vendor::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),

            ]);
            return redirect()->back()->with('success','Le compte du vendor est crée avec succes');

        }
        catch (Exception $e) {
            throw new Exception("Erreur survenue lors de la creation du compte du vendor", 1);

        }
    }
    public function handlogin(HandLoginVendorRequest $request)
    {
        try {

            if(auth('vendor')->attempt($request->only('email','password')))
            {
                return redirect()->route('vendor.dashboard');
            }
            else{
                return redirect()->back()->with('error','Les parametres saisies sont incorrectes');
            }
        }
        catch (Exception $e) {

            throw new Exception("Erreur survenue lors de la connexion", 1);

        }
    }
}
