@extends('layouts.dashboard_vendor')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Editer un Produit</h1>
    <div class="card mb-4">
        <div class="card-header" style="display:flex; justify-content:flex-end;">
            <a href="{{route('article.liste')}}" class="btn btn-primary btn-sm" >Liste des Produits</a>
        </div>
        @if (session('error'))
        <div class="alert alert-danger">
            {{session('success')}}
        </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success mt-2 p-2">
                {{session('success')}}
            </div>
        @endif

        <div class="card-body">
            <form action="{{route('article.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group mb-2">
                    <label for="">Libellé du Produit</label>
                    <input type="text" class="form-control" name="name" value="{{$product->name}}">
                    @error('name')
                        <div style="color:red;">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="">Photo du Produit</label>
                    @if ($product->image)
                    <div class="col md-2">
                        <img style="width: 50px; height:50px;" src="{{asset('storage/'.
                        $product->image->path)}}" alt="">
                        <a href="{{url('vendor/dashboard/article/delete/'.$product->id)}}">Supprimer</a>
                        {{-- <a href="{{url('vendor/dashboard/article/delete/'.$product->id)}}">Supprimer</a> --}}
                    </div>
                    {{-- <div style="background-image: url('{{asset('storage/'.
                    $product->image->path)}}');
                    width:50px;
                    height:50px;
                    background-position:center;
                    background-size:cover;
                    ">
                    </div> --}}
                    @else
                        <div style="color:red;">Aucune image du produit trouvée</div>
                    @endif

                </div>
                <div class="form-control">
                    <input type="file" class="form-control" name="image" accept=".png, .jpg, .jpeg">
                </div>
                <div class="form-group mb-2">
                    <label for="">Description du Produit</label>
                    <textarea name="description" id="" cols="15" rows="5" class="form-control">{{$product->description}}</textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="">Prix du Produit</label>
                    <input type="number" class="form-control" name="price" value="{{$product->price}}">
                    @error('price')
                       <div style="color:red;">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <input type="submit" class="btn btn-primary" value="Mettre à jour le Produit">
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
