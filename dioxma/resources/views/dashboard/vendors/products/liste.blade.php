@extends('layouts.dashboard_vendor')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Liste des Produits</h1>
        <div class="card mb-4">
            <div class="card-header" style="display:flex; justify-content:flex-end;">
                <a href="{{route('article.create')}}" class="btn btn-primary btn-sm" >Ajouter un Produit</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Libelle du Produit</th>
                            <th>Description du Produit</th>
                            <th>Price</th>
                            <th>Disponibilite</th>
                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                        <tr>

                            <td>
                               @if ($product->image)
                                   <div style="background-image: url('{{asset('storage/'.
                                   $product->image->path)}}');
                                   width:50px;
                                   height:50px;
                                   background-position:center;
                                   background-size:cover;
                                   ">
                                   </div>
                               @endif
                            </td>

                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->active ? 'Disponible' : 'Rupture de stock'}}</td>
                            <td></td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
