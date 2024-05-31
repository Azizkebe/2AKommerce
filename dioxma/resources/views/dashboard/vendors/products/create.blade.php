@extends('layouts.dashboard_vendor')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Ajouter un Produit</h1>
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
            <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf

                <div class="form-group mb-2">
                    <label for="">Nom du Produit</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-control mb-2">
                    <label for="">Ajouter la photo du Produit</label>
                    <input type="file" class="form-control" name="image" accept=".png, .jpg, .jpeg">
                </div>
                <div class="form-group mb-2">
                    <label for="">Description du Produit</label>
                    <textarea name="description" id="" cols="15" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="">Prix du Produit</label>
                    <input type="number" class="form-control" name="price">
                </div>
                <div class="form-group mb-2">
                    <input type="submit" class="btn btn-primary" value="Enregistrer le Produit">
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
