<?php

namespace App\Http\Controllers\Vendor\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\CloudFile;

use App\Models\Product;


class ProductController extends Controller
{
    public function liste()
    {
        $product = Product::latest()->with('image')->get();
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
            // dd($request);
            $products = Product::create($productData);
            $this->handleImageUpload($products,$request,'image','CloudFile/Products','cloudfile_id');


            return redirect()->back()->with('success','Le produit à été ajouté avec succes');
            DB::commit();

        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', $e->getMessage());
            // throw new Exception("Erreur survenue lors de la modification", $e->getMessage());
        }

    }
    public function handleImageUpload($data, $request, $inputkey, $destination, $attributeName)
    {
        if($request->hasFile($inputkey))
        {
            //Chemin vers le fichier
            $filePath = $request->file($inputkey)->store($destination,'public');
            $cloudfile = CloudFile::create([
                'path'=> $filePath,
            ]);

            $data->{$attributeName} = $cloudfile->id;

            $data->update();
        }
    }

}