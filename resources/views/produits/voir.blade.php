@extends('administrateur.app')
@section('content')
<div class="row mt-4">
<div class="col-lg-6 mt-4 ml-4">
    <div class="bg-light rounded-pill px-3 text-uppercase font-weight-bold">
        {{ $produit->titre }}
    </div>
<div class="p-4">
<p class="font-italic mb-4"></p>
<ul class="list-unstyled mb-4">
<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Nom produit</strong><strong>{{ $produit->titre }}</strong></li>
<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Categorie produit</strong><strong>{{ $produit->categorie->nom }}</strong></li>
    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Prix</strong><strong>{{ getPrice($produit->prix) }}</strong></li>
    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Quantite</strong><strong>{{ $produit->quantite }}</strong></li>
    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">qualite</strong><strong>{{ $produit->qualite }}</strong></li>
</ul>
<a class="btn btn-dark rounded-pill py-2 btn-black w-100" href="{{ route('produits.edit',['produit'=>$produit]) }}">Modifier le produit</a>
</div>
</div>
<div class="col-lg-3">
    <img src="/img/{{ $produit->image }}"  class="img-thumbnail" />
</div>
</div>
@endsection
