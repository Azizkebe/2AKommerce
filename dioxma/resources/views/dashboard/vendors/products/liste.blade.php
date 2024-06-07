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
                            <th>Statut du Produit</th>
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
                            <td>{{$product->price}} F CFA</td>
                            <td>
                                @if ($product->active == true)
                                    <a style="border-radius: 15px;" href="{{route('article.status',$product->id)}}" class="btn btn-sm btn-primary">Disponible</a>
                                @else
                                <a style="border-radius: 15px;" href="{{route('article.status',$product->id)}}" class="btn btn-sm btn-danger">Non disponible</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('article.edit',$product->id)}}"><span class="fa fa-edit"></span></a>
                                &nbsp;&nbsp;&nbsp;<a onclick="return confirm('Etes-vous sur de vouloir supprimer le produit ?')"
                                 href="{{route('article.delete', $product->id)}}"><span class="fa fa-trash"> </span></a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
