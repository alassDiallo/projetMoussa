@extends('layouts.template',['titre'=>'accueil'])
@section('content')
@foreach ($produits as $produit)
    <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col-auto d-none d-lg-block">
          <img src="{{ asset('/img/img2.jpg') }}">
          </div>
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">

                     {{ $produit->categorie->nom }}
            </strong>
          <h5 class="mb-0">{{ $produit->titre }}</h5>
            <div class="mb-1 text-muted">{{ $produit->created_at->format('d/m/Y') }}</div>
            <p class="card-text mb-auto">{{ $produit->sousTitre }}.</p>
          <strong>{{ getPrice($produit->prix) }}</strong>
          <a href="{{ route('produits.show',$produit->slug) }}" class="stretched-link btn btn-info"><i class="fa fa-eye mr-2"></i>consulter l'article</a>
          </div>

        </div>
      </div>
    @endforeach
    <div class="col-md-12 text-center mt-4 mb-4" style="margin-left: 350px;">
        {{ $produits->appends(request()->input())->links() }}
    </div>

    @endsection
