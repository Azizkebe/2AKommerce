<div class="col mb-5">
    <div class="card h-100">
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
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">{{$product->name}}</h5>
                <!-- Product price-->
                {{$product->price}} FCFA
            </div>
        </div>
        <!-- Product actions-->
        @auth
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Payer</a></div>
            </div>
        @endauth

    </div>
</div>
