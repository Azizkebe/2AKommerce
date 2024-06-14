<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                    </ul>
                </li>
            </ul>
            {{-- <li style="display: none;" class="nav-item">
                <a href="" class="btn btn-primary"> Panier
                <i class="bi-cart-fill me-1"></i>

                <span style="color:blue;" class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </a>
            </li> --}}
            <form class="d-flex" action="{{route('show_cart.product')}}">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">{{$cart}}</span>
                </button>
            </form>
            @guest
            <div style="margin-left: 1rem;">
                <li class="nav-item dropdown" style="list-style-type: none;">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Compte</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{route('user.register')}}">Creer un compte</a></li>
                        <li><a class="dropdown-item" href="{{route('login')}}">Se connecter</a></li>
                    </ul>
                </li>
            </div>
            {{-- <div style="margin-left: 1rem;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown3" href="{{route('pay.create')}}">Configuration</a>
                </li>
            </div> --}}
            @endguest
            @auth
                <a style="margin-left:1rem;" href="{{route('user.deconnexion')}}" class="btn btn-danger">Deconnexion</a>
            @endauth

        </div>
    </div>
</nav>
