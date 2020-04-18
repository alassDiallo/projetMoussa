@extends('administrateur.app')
@section('content')
<div class="card  bb-info border-info ">
    <div class="card-header bg-info" style="color:white;">
       <h4> Ajouter un Article</h4>
    </div>
    <div class="card-body">
    <form method="POST" action="{{ route('produits.store') }}" id="form"  enctype="multipart/form-data" class="">
        @csrf
<div class="row">
<div class="form-group col-lg-6">
    <label for="titre"> Titre*</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
<input type="text" name="titre" maxlength="20" placeholder="entrer le titre de l'article" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre') }}" @error('titre') autofocus @enderror/>
</div>
@error('titre')
<span class="helper" role="alert">
   {{ $message }}
</span>
@enderror

</div>

<div class="form-group col-lg-6">
<label for="sousTitre">Sous Titre *</label>
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
<input type="text" name="sousTitre" placeholder="entrer le sous titre de l'article" maxlength="50" class="form-control @error('sousTitre') is-invalid @enderror" value="{{ old('sousTitre') }}" @error('sousTitre') autofocus @enderror />
</div>
@error('sousTitre')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
</div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        <label for="categorie">Categorie*</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
        <select class="form-control custom-select @error('categorie') is-invalid @enderror" id="categorie" name="categorie" onchange="montant();">
            <option value="">--selectionner--</option>
            @foreach($categorie as $categorie)
        <option {{ old('categorie')==$categorie->slug? "selected":"" }} value="{{ $categorie->slug }}"> {{ $categorie->nom  }}</option>
            @endforeach
        </select>
    </div>
    @if(session()->has('message'))
<span class="helper helper-danger ml-2">
    {{ session()->get('message') }}
 </span>
 @endif
    @error('categorie')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
</div>
<div class="form-group col-lg-6">
    <label for="qualite">Qualite*</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
        <input type="text" name="qualite" value="{{ old('qualite') }}" placeholder="saisissez la qualité du produit" class="form-control @error('qualite') is-invalid @enderror" @error('qualite') autofocus @enderror/>
</div>
@error('qualite')
<span class="helper helper-danger">{{ $message }}</span>
@enderror
</div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        <label for="prix">Prix Unitaire*</label>
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
    <input type="text" name="prix" maxlength="20" placeholder="entrer le prix de l'article" class="form-control @error('prix') is-invalid @enderror" value="{{ old('prix') }}" @error('prix') autofocus @enderror/>
    </div>
    @error('prix')
    <span class="helper" role="alert">
       {{ $message }}
    </span>
    @enderror

    </div>

    <div class="form-group col-lg-6">
    <label for="quantite">quantite*</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
    <input type="text" name="quantite" placeholder="entrer la quantite de l'article" maxlength="50" class="form-control @error('quantite') is-invalid @enderror" value="{{ old('quantite') }}" @error('quantite') autofocus @enderror />
    </div>
    @error('quantite')
    <span class="helper helper-danger">{{ $message }}</span>
    @enderror
    </div>
    </div>


    <div class="row">
        <div class="form-group col-lg-6">
            <label for="image">Image*</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
        <input type="file" name="image" class="file-control @error('image') is-invalid @enderror" value="{{ old('image') }}"/>
        </div>
        @error('image')
        <span class="helper" role="alert">
           {{ $message }}
        </span>
        @enderror

        </div>
    </div>
    <div>
        <div class="form-group">
        <label for="description">Description*</label>
        <textarea cols="6" rows="4" name="description" class="form-control @error('description') is-invalid @enderror" @error('description') autofocus @enderror>{{ old('description') }}</textarea>
        @error('description')
        <span class="helper helper-danger">{{ $message }}</span>
        @enderror
        </div>
        </div>
        <input type="submit" name="valider" value="Enregistrer l'article" class="btn btn-primary form-control"/>
    </form>
</div>
</div>
@endsection
