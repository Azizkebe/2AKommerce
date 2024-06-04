@extends('layouts.dashboard_vendor')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Configuration du compte de paiement</h1>
    <div class="card mb-4">
        <div class="card-header" style="display:flex; justify-content:flex-end;">
            <a href="{{route('article.liste')}}" class="btn btn-primary btn-sm" >Liste des Produits</a>
        </div>
        @if (session('error'))
        <div class="alert alert-danger">
            {{session('success')}}
        </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success mt-2 p-2">
                {{session('success')}}
            </div>
        @endif

        <div class="card-body">
            <form action="{{route('config.store')}}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf

                <div class="form-group mb-2">
                    <label for="">API KEY</label>
                    <input type="text" class="form-control" name="api_key" value="{{$infoconfig ? $infoconfig->API_KEY :''}}">
                    @error('api_key')
                        <div style="color:red;">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="">SITE_ID</label>
                    <input type="text" class="form-control" name="site_id" value="{{$infoconfig ? $infoconfig->SITE_ID : ''}}">
                    @error('site_id')
                       <div style="color:red;">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="">secret_key</label>
                    <input type="text" class="form-control" name="secret_key" id="secret_key" value="{{$infoconfig ? $infoconfig->Secret_Key : ''}}">
                </div>
                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-primary">
                        {{ $infoconfig ? 'Mettre à Jour' : 'Enregistrer'}}
                    </button>
                    {{-- <input type="submit" class="btn btn-primary" value="Enregistrer"> --}}
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
