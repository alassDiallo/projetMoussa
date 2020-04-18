@extends('administrateur.app')
@section('content')
<div class="row mt-4">
<div class="col-lg-8 mt-4 ml-4">
    <div class="bg-light rounded-pill px-3 text-uppercase font-weight-bold">
        Commande numero {{ $commande->numeroCommande }}<br/> date commande {{ $commande->created_at->format('d/m/Y  H:i:s') }}
    </div>
<div class="p-4">
<p class="font-italic mb-4"></p>
<ul class="list-unstyled mb-4">
    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Numero Telephone  du client</strong><strong>{{ $commande->telephoneClient }}</strong></li>
    @foreach ($commande->produits as $produit)
<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Nom de l'article</strong><strong>{{ $produit->titre }}</strong></li>
<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Categorie de l'article</strong><strong>{{ $produit->categorie->nom }}</strong></li>
    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">qualite</strong><strong>{{ $produit->qualite }}</strong></li>
    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Prix unitaire</strong><strong>{{ getPrice($produit->prix) }}</strong></li>
    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">quantite Commandé</strong><strong>{{ $produit->pivot->quantiteCommande }}</strong></li>
    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong><strong>{{ getPrice($produit->prix*$produit->pivot->quantiteCommande) }}</strong></li>
    @endforeach
</ul>
<a class="btn btn-dark rounded-pill py-2 btn-black w-100" href="{{ route('commande.valider',['commande'=>$commande]) }}">valider le commande</a>
</div>
</div>
</div>
@endsection
