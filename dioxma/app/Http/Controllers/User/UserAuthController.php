<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HandleRequest;
use App\Http\Requests\HandloginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserAuthController extends Controller
{
    public function register()
    {
        return view('auth.user.register');
    }
    public function handregister(HandleRequest $request)
    {
        try {
            //code...
            User::create([
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> Hash::make($request->password),
            ]);

            return redirect()->route('user.register')->with('success', 'le compte a été crée avec succéss');

        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de la creation du compte", 1);

        }
    }
    public function login()
    {
        return view('auth.user.login');
    }
    public function handlogin(HandloginRequest $request)
    {
        if(auth()->attempt($request->only('email','password')))
        {
            return redirect('/');
        }
        else{
            return redirect()->back()->with('error','Les parametres saisis sont incorrectes');
        }
    }
    public function deconnexion()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
