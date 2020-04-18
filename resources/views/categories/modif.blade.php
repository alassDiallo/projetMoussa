@extends('administrateur.app')
@section('content')
<div class="ajout col-lg-6">
    <div class="card card-info">
        <div class="card-header">
            Modifier une Categorie
        </div>
        <div class="card-body">
    <form action="{{ route('categorie.update',['categorie'=>$categorie]) }}" method="POST">
        @csrf
            <div class="form-group">
                <label for="nom">Categorie*</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="entrer le nom de la nom" value="{{ $categorie->nom }}" @error('nom') autofocus @enderror/>
            </div>
            @if(session()->has('message'))
            <span class="helper helper-danger">{{ session()->get('message') }}</span>
            @endif
            @error('nom')
        <span class="helper helper-danger">{{ $message }}</span>
        @enderror
            </div>
        <input type="submit"  name="valider" value="modifier la categorie" role="button" class="btn btn-primary form-control"/>
    </form>
    </div>
    </div>
    @endsection
