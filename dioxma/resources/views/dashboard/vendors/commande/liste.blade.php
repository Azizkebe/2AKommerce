@extends('layouts.dashboard_vendor')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Liste des Commandes</h1>
        <div class="card mb-4">
            <div class="card-header" style="display:flex; justify-content:flex-end;">
                {{-- <a href="{{route('article.create')}}" class="btn btn-primary btn-sm" >Ajouter un Produit</a> --}}
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Libelle du Produit</th>
                            <th>Quantite </th>
                            <th>Price</th>
                            <th>Nom du Client</th>
                            <th>Telephone du Client</th>
                            <th>Email du Client</th>
                            <th>Nature de la Commande</th>
                            <th>Statut de la commande</th>
                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($commandes as $commande)
                        <tr>

                            <td>
                               @if ($commande->image)
                               {{$commande->image}}
                                   {{-- <div style="background-image: url('{{asset('storage/'.
                                   $commande->image)}}');
                                   width:50px;
                                   height:50px;
                                   background-position:center;
                                   background-size:cover;
                                   ">
                                   </div> --}}
                               @endif
                            </td>
                            <td>{{$commande->product_id}}</td>
                            <td>{{$commande->quantity ?? '0'}} article(s)</td>
                            <td>{{$commande->price}} F CFA</td>
                            <td>{{$commande->name}}</td>
                            <td>{{$commande->phone}}</td>
                            <td>{{$commande->email}}</td>

                            @if ($commande->paiement_status == 'Paiement à la livraison')
                            <td class="cell">{{$commande->paiement_status}}</td>
                            @else
                            <td style="color: green;" class="cell">{{$commande->paiement_status}}</td>
                            @endif
                            <td class="cell">{{$commande->livraison_status}}</td>

                            <td class="cell">
                                @if ($commande->livraison_status == 'En cours')
                                <a onclick="return confirm('le changement de status est irreversible! Etes vous sure ?')"
                                href="{{route('commande.livraison', $commande->id)}}" class="btn btn-sm btn-primary">Changer le statuts</a>
                                @else
                                <p style="color:green; font-size:25px;">Effectué</p>
                                @endif

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
