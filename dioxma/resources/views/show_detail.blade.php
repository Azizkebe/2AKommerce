@extends('layouts.website')

@section('content')
<link rel="stylesheet" href="{{asset('ressources/css/show_cart.css')}}">

<div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Mon Panier</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Produits &amp; Details</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Prix du Produit</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Quantite Commandé</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $total_price=0; ?>
                    {{-- @foreach () --}}
                        @forelse ($cart as $cart)
                        <tr>
                            <td class="p-4">
                                <div class="media align-items-center">
                                    <img src="{{$cart->image}}" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                    <div class="media-body">
                                      <a href="#" class="d-block text-dark">{{$cart->Product_id}}</a>
                                      <small>
                                        <span class="text-muted">Color:</span>
                                        <span class="ui-product-color ui-product-color-sm align-text-bottom" style="background:#e81e2c;"></span> &nbsp;
                                        <span class="text-muted">Size: </span> EU 37 &nbsp;
                                        <span class="text-muted">Ships from: </span> China
                                      </small>
                                    </div>
                                  </div>
                            </td>
                            <td class="text-right font-weight-semibold align-middle p-4">{{$cart->price}}</td>
                            <td class="align-middle p-4"><input type="text" class="form-control text-center" value="{{$cart->number}}"></td>
                            <td class="text-right font-weight-semibold align-middle p-4">{{$cart->price * $cart->number}}</td>
                            <td class="text-center align-middle px-0">
                                {{-- <a href="" class="btn btn-sm btn-success">Editer</a>
                                &nbsp;&nbsp;&nbsp; --}}
                                <a onclick="return confirm('Etes vous sure de vouloir supprimer la commande')" href="{{route('delete_cart.product',$cart->id)}}" class="btn btn-sm btn-danger">Supprimer</a>&nbsp;&nbsp;
                            </td>
                        </tr>
                        <?php $total_price = $total_price + ($cart->price*$cart->number) ?>

                        @empty
                        <td style="color:red; text-align:center;" colspan="5">Le panier est vide</td>
                            {{-- <p colspan="5"></p> --}}
                        @endforelse
                    {{-- @endforeach --}}
                </tbody>
              </table>
            </div>
            <!-- / Shopping cart table -->

            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">

                <div>
                  <label class="text-muted font-weight-normal m-0">Prix Total: </label>
                  <div style="display:flex; justify-content:flex-end;"><strong>{{$total_price}} FCFA</strong></div>
                </div>

            </div>

            <div style="display:flex; justify-content:flex-end;">
              <button style="margin-right: 4px;" type="button" class="btn btn-sm btn-secondary md-btn-flat mt-2 mr-3">Par Wave, Orange Money, Free Money, ..</button>
              <button type="button" class="btn btn-sm btn-primary mt-2">Paiement à la livraison</button>
            </div>

          </div>
      </div>
  </div>
@endsection
