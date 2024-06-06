<?php

namespace App\Http\Controllers\Vendor\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\CloudFile;

use App\Models\Product;


class ProductController extends Controller
{
    public function liste()
    {
        $product = Product::where('vendor_id',auth('vendor')->user()->id)->latest()->with('image')->get();
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


            return redirect()->route('article.liste')->with('success','Le produit à été ajouté avec succes');
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
    public function edit(int $id)
    {
        $product = Product::findOrFail($id);

        return view('dashboard.vendors.products.edit',[
            'product'=> $product,
        ]);
    }
    public function update(int $id, Request $request)
    {

    $productupdate = Product::findOrFail($id);
        try {
            DB::beginTransaction();
    // $productData = [
        $productupdate->name = $request->name;
        $productupdate->description = $request->description;
        $productupdate->price = $request->price;
        $productupdate->vendor_id = auth('vendor')->user()->id;
        if($productupdate->active)
        {
            $productupdate->update(['active', '1']);
        }
        else{
            $productupdate->update(['active', '0']);

        }
    // ];
    // dd($request);

    // $products = Product::update($productData);
    $this->handleImageUpload($productupdate,$request,'image','CloudFile/Products','cloudfile_id');

    $productupdate->update();
    return redirect()->route('article.liste')->with('success','Le produit à été ajouté avec succes');
    DB::commit();

} catch (Exception $e) {
    DB::rollback();

    return redirect()->back()->with('error', $e->getMessage());
    // throw new Exception("Erreur survenue lors de la modification", $e->getMessage());
}
    }
    public function destroy_image(int $path_image)
    {
        $deleteImage = CloudFile::findOrFail($path_image);
        $productdata = Product::findOrFail($path_image);



        // dd($productdata);

        if($deleteImage->path) {

            $deleteImage->delete();

            $productdata->update(['cloudfile_id'=>$deleteImage->id]);


            return redirect()->route('article.edit',$productdata->id)->with('success','Image du produit a été supprimé');

        }
        else
        {
            return redirect()->route('article.edit',$productdata->id)->with('success','Image du produit a été supprimé');

        }

        return redirect()->route('article.edit',$productdata->id)->with('success','Image du produit a été supprimé');

    }
    public function update_status (int $id, Request $request)
    {
        $product = Product::findOrFail($id);

        dd($request);

    }
    public function delete(int $article)
    {
        $productDat = Product::findOrFail($article);

        $productDat->delete();

        return redirect()->back()->with('success','Le produit a été supprimé avec succes');
    }

}
