@extends('layouts.website')

@section('content')
<link rel="stylesheet" href="{{asset('ressources/css/product_detail.css')}}">

<div class="container">
    <div class="card mb-4">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">

                    <div class="preview-pic tab-content">
                      <div class="tab-pane active" id="pic-1"><img style="width: 400px; height:350px;" src="{{asset('storage/'.$product->image->path)}}" /></div>
                      {{-- <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
                      <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
                      <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
                      <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div> --}}
                    </div>
                    {{-- <ul class="preview-thumbnail nav nav-tabs">
                      <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                      <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                      <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                      <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                      <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                    </ul> --}}

                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{$product->name}}</h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">Vendeur:</span><span style="color:#47580f; font-weight:bolder;" class="review-no"> {{$product->vendeur->name}}</span>
                    </div>
                    <p class="product-description">{{$product->description}} - Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
                    <h5 class="price">PRIX DE VENTE: <span style="color:#47580f;">{{$product->price}} F CFA</span></h5>
                    <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                    <p class="vote"><strong>Quantite:</strong><span style="color:red;">12</span></p>
                    <div class="row">
                        <form action="">
                            <input type="number" name="number" value="0">
                            <input type="submit" class="btn btn-sm btn-primary" value="Ajouter au Panier" name="" id="">
                        </form>
                    </div>
                    {{-- <div class="action">
                        <button class="fa fa-shopping-cart btn btn-default btn-primary" type="button">add to cart</button>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
