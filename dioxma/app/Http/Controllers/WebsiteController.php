<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class WebsiteController extends Controller
{
    public function index()
    {
        // $products = Product::latest()->with('image')->paginate(20);
        $products = Product::where('active',true)->latest()->with('image')->paginate(20);

        // $id = Auth::user()->id;

        // $cart = Cart::all()->count();

        return view('welcome',[
            'products'=> $products,
            // 'cart'=> $cart,
        ]);
    }
}
