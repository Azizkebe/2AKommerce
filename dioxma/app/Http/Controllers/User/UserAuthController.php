<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HandleRequest;
use App\Http\Requests\HandloginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;

class UserAuthController extends Controller
{
    public function register()
    {
        if(Auth::id())
        {
            $id = Auth::user()->id;
            $cart = Cart::where('User_id','=',$id)->get();
            return view('auth.user.register', compact('cart'));
        }
        else
        {
            $cart = 0;
            return view('auth.user.register', compact('cart'));
        }
    }
    public function handregister(HandleRequest $request)
    {
        try {

            $user = new User;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->address = $request->address;

            $user->save();

            return redirect()->route('login')->with('success', 'le compte a été crée avec succéss');

        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de la creation du compte", 1);

        }
    }
    public function login()
    {
        if(Auth::id())
        {
            $cart = Cart::where('User_id','=',$id)->get();
            return view('auth.user.login',compact('cart'));
        }
        else{

            $cart = 0;
            return view('auth.user.login',compact('cart'));


        }

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
