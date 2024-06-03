<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class WebsiteController extends Controller
{
    public function index()
    {
        $products = Product::latest()->with('image')->paginate(20);
        return view('welcome',[
            'products'=> $products
        ]);
    }
}
