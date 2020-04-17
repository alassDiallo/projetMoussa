@extends('layouts.template',['titre'=>'page Produit'])
@section('content')
    <div class="col-md-12 mt-4">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">

                {{ $produit->categorie->nom }}
            </strong>
          <h5 class="mb-0">{{ $produit->titre }}</h5>
            <div class="mb-1 text-muted">{{ $produit->created_at->format('d/m/Y') }}</div>
            <p class="card-text mb-auto">{!! $produit->description !!}</p>
          <strong>{{ getPrice($produit->prix)}}</strong>
              <a class="btn btn-success"  href="{{ route('commander',['produit'=>$produit->slug]) }}"><i class="fa fa-paper-plane mr-2"></i>Passer la commande</a>
          </form>
          </div>
          <div class="col-auto d-none d-lg-block">
          <img src="{{ asset('/img/img2.jpg') }}">
          <div class="mt-2">
            @if($produit->images)
              @foreach(json_decode($produit->images,true) as $images)
              <img src="{{ asset('storage/'.$images) }}" width="50" class="img-thumbnail">
              @endforeach
              @endif
          </div>

          </div>
        </div>
      </div>
      <div class="mt-2 mb-2 col-lg-12">
      <h3 >Produit simmilaires</h3>
      </div>
      @foreach ($prod as $produit)
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
<div style="margin-left:450px;">
    {{ $prod->appends(request()->input())->links() }}
</div>
@endsection

