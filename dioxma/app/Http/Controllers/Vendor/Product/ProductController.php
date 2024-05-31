<?php

namespace App\Http\Controllers\Vendor\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Product;


class ProductController extends Controller
{
    public function liste()
    {
        $product = Product::all();
        return view('dashboard.vendors.products.liste',[
            'products'=> $product,
        ]);
    }
    public function create()
    {
        return view('dashboard.vendors.products.create');
    }
    public function store(ArticleStoreRequest $request)
    {
                try {
                    DB::beginTransaction();
            $productData = [
                'name'=> $request->name,
                'description'=> $request->description,
                'price'=> $request->price,
                'vendor_id' => auth('vendor')->user()->id,

            ];
            $products = Product::create($productData);
                return redirect()->back()->with('success','Le produit à été ajouté avec succes');
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', $e->getMessage());
            // throw new Exception("Erreur survenue lors de la modification", $e->getMessage());
        }
    }
}
