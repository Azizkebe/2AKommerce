<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HandleRequest;
use Illuminate\Support\Facades\Hash;
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

            return redirect()->back('success', 'le compte a été crée avec succéss');

        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors de la creation du compte", 1);

        }
    }
}
