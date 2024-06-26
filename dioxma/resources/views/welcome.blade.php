 @extends('layouts.website')

 @section('content')
 <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            @forelse ($products as $product)
                {{-- <x-product-item :product="$product" /> --}}
                <div class="col mb-5">
                    <div class="card h-100">
                        <div style="margin:5px;
                                    border:1 solid white;
                                    border-radius:5px;
                                    background-color:black;
                                    color:{{$product->active ? 'white' : 'yellow'}};
                                    width:120px; height:35px; font-size:14px;"
                         class="card-header">{{$product->active ? 'Disponible' : 'Non disponible'}}</div>
                        <!-- Product image-->
                            @if ($product->image)
                            <div style="background-image: url('{{asset('storage/'.$product->image->path)}}');
                            width:100%;
                            height:200px;
                            background-position:center;
                            background-repeat: no-repeat;
                            background-size:cover;
                            ">
                            </div>

                                {{-- <img class="card-img-top" src="{{asset('storage/'.$product->image->path)}}" alt=""> --}}
                            @else
                            <img class="card-img-top" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{$product->name}}" alt="..." />

                            @endif
                        <!-- Product details-->

                        <div style="margin:auto;" class="row mb-1">
                            <form action="{{route('add_cart.product', $product->id)}}">
                                <input style="width: 50px;" class="form-style" type="number" name="number" value="1" min="1">
                                <input style="background-color:black; color:white;" class="form-style" type="submit" class="btn btn-sm btn-primary" value="Ajouter Au Panier" name="" id="">
                            </form>

                        </div>
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$product->name}}</h5>
                                <!-- Product price-->
                                {{$product->price}} FCFA
                            </div>
                        </div>

                        <!-- Product actions-->
                        {{-- @auth --}}
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('detail.product',$product->id)}}">Detail du Produit</a></div>
                                {{-- <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('order.payment',$product->id)}}">Payer</a></div> --}}
                            </div>
                        {{-- @endauth --}}

                    </div>
                </div>

            @empty
                <p colspan="6">Aucun produit trouvé</p>
            @endforelse



        </div>
    </div>
</section>
 @endsection
