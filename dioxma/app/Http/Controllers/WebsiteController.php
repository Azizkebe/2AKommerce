<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;

class WebsiteController extends Controller
{
    public function index()
    {
        try {
            $products = Product::where('active',true)->latest()->with('image')->paginate(20);

            if(Auth::id())
            {


            $id = Auth::user()->id;

            $cart = Cart::where('user_id','=',$id)->get();

                return view('welcome',[
                    'products'=> $products,
                    'cart'=> $cart,
                ]);
            }
            else
            {
                $cart = 0;
                return view('welcome',[
                    'products'=> $products,
                    'cart'=> $cart,
                ]);
            }
        } catch (Exception $e) {
            throw new Exception("Erreur survenue lors du demarrage de la page d'accueil", $e->getMessage());

        }
        // $products = Product::latest()->with('image')->paginate(20);


    }
}
