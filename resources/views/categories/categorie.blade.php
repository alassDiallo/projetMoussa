@extends('administrateur.app')
@section('content')
<div class="container">
    <div class="bg-info text-center mt-4" style="color:white;">
<h2>Categorie {{ $categorie->nom }}</h2>
    <h4 class="text-center">Nombre de {{ Str::plural('produit',$categorie->produits->count()) }} : {{ $categorie->produits->count() }}</h4>
    </div>
    <h4>Liste des articles  </h4>
@if(! $categorie->produits->isEmpty())
<table class="table table-stripped table text-center">
    <thead>
    <tr>
        <td>N</td>
        <th>Titre</th>
        <th>qualite</th>
        <th>Prix</th>
        <th>quantite</th>
        <th>image</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
@foreach($categorie->produits as $produit)
<tr>
    <td>{{ $i++ }}</td>
    <td>{{ $produit->titre }}</td>
    <td>{{ $produit->qualite}}</td>
    <td>{{ $produit->prix}}</td>
    <td>{{ $produit->quantite}}</td>
    <td>{{ $produit->image}}</td>
<td><a href="{{ route('produits.show',['produit'=>$produit]) }}" class="btn btn-info btn-xs"><i class="fa fa-eye">Voir</i></a></td>
<td><a href="{{ route('produits.edit',['produit'=>$produit]) }}" class="btn btn-success"><i class="fa fa-edit ">Modifier</i></a></td>
<td><form action="{{ route('produits.destroy',['produit'=>$produit]) }}" method="POST" onSubmit="return confirm('etes-vous de vouloire delete cet produit');">
    @csrf
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-danger" value="Supprimer"><i class="fa fa-trash"></i></button>
    </form>
</td>
</tr>
@endforeach
    </tbody>
</table>
@else
<div class="col-lg-12 alert">
<h1>{{ __("Cette categorie n'a pas de produit") }}</h1>
</div>
@endif
</div>
</div>
</div>
@endsection
