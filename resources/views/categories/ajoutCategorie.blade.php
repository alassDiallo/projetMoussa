@extends('administrateur.app')
@section('content')
<div class="ajout col-lg-8" style="margin-top:100px;">
    <div class="card  border-info">
        <div class="card-header bg-info" style="color: white;">
            <h4>Ajouter une Categorie</h4>
        </div>
        <div class="card-body">
    <form action="{{ route('categorie.store') }}" method="POST">
        @csrf
            <div class="form-group">
                <label for="nom">Categorie*</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="entrer le nom de la nom" value="{{ old('nom') }}" @error('nom') autofocus @enderror/>
            </div>
            @if(session()->has('message'))
            <span class="helper helper-danger">{{ session()->get('message') }}</span>
            @endif
            @error('nom')
        <span class="helper helper-danger">{{ $message }}</span>
        @enderror
            </div>
        <input type="submit"  name="valider" value="ajouter la Categorie" role="button" class="btn btn-primary form-control"/>
    </form>
    </div>
    </div>
    @endsection
