 @extends('layouts.website')

 @section('content')
 <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            @forelse ($products as $product)
                <x-product-item :product="$product" />
            @empty
                <p colspan="6">Aucun produit trouvé</p>
            @endforelse



        </div>
    </div>
</section>
 @endsection
