@extends('layouts.website')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">

        {{-- <div class="text-center mb-5 text-dark">Made with bootstrap</div> --}}
        <div class="card my-5">
            @if (session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">x</button>
                    {{session('success')}}
                </div>
            @endif

          <form class="card-body cardbody-color p-lg-5"
          method="POST" action="{{route('user.handregister')}}">
          @csrf
          @method('POST')
            <div>
                <h2 class="text-center text-dark mt-1">Authentification</h2>
            </div>
            <div class="text-center">
              <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" id="name" name="name"
                placeholder="Nom et Prenom" value="{{old('name')}}">
                @error('name')
                    <span class="error">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email"
                  placeholder="Email@gmail.com" value="{{old('email')}}">
                  @error('email')
                      <span class="error">{{$message}}</span>
                  @enderror
              </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" name="password" placeholder="Mot de Passe" value="{{old('password')}}">
                @error('password')
                    <span class="error">{{$message}}</span>
                @enderror
            </div>
            <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Se Connecter</button></div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">Si vous n'avez pas de compte
            <a href="#" class="text-dark fw-bold"> Creer un compte Ici</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <style>
    .btn-color{
  background-color: #0e1c36;
  color: #fff;

}

.profile-image-pic{
  height: 200px;
  width: 200px;
  object-fit: cover;
}



.cardbody-color{
  background-color: #ebf2fa;
}

a{
  text-decoration: none;
}
.error{
    color:red;
}
  </style>
@endsection
