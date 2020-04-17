@extends('layouts.template',['titre'=>'commande'])
@section('content')
<script>


    function total(){
        var t = document.getElementById("quantite").value;
        var d = document.getElementById('som');
        d.innerHTML =t*{{ $prod->prix }};

    }

    </script>

<div class="col-md-6 mt-4">
    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
      <div class="col p-4 d-flex flex-column position-static">
        <strong class="d-inline-block mb-2 text-primary">

            {{ $prod->categorie->nom }}
        </strong>
      <h5 class="mb-0">{{ $prod->titre }}</h5>
        <div class="mb-1 text-muted">{{ $prod->created_at->format('d/m/Y') }}</div>
        <p class="card-text mb-auto">{!! $prod->description !!}</p>
      <strong>{{ getPrice($prod->prix)}}</strong>
          <a class="btn btn-success"  href="{{ route('commander',['prod'=>$prod->slug]) }}"><i class="fa fa-paper-plane mr-2"></i>Passer la commande</a>
      </form>
      </div>
      <div class="col-auto d-none d-lg-block">
      <img src="{{ asset('/img/img2.jpg') }}">
      <div class="mt-2">
        @if($prod->images)
          @foreach(json_decode($prod->images,true) as $images)
          <img src="{{ asset('storage/'.$images) }}" width="50" class="img-thumbnail">
          @endforeach
          @endif
      </div>

      </div>
    </div>
  </div>


<div class="col-lg-6">
    <div class="bg-light rounded-pill px-3 text-uppercase font-weight-bold">
        Vos commandes
    </div>
<div class="p-4">
<p class="font-italic mb-4"></p>
<form action="{{ route('commande.store',['produit'=>$prod->slug]) }}" method="POST">
    @csrf
<ul class="list-unstyled mb-4">
<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Nom prod</strong><strong>{{ $prod->titre }}</strong></li>
<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Categorie prod</strong><strong>{{ $prod->categorie->nom }}</strong></li>
    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Prix</strong><strong>{{ getPrice($prod->prix) }}</strong></li>
    <li class="d-flex justify-content-between py-3">
            <div class="form-group w-100">
            <label for="quantite">Quantite</label>
            <input type="text" name="quantite" id="quantite" class="form-control w-100 @error('quantite') is-invalid @enderror" style="border:none;border-bottom:2px solid;" placeholder="veuillez selectionner la quantité" onchange="total();" @error('quantite') autofocus @enderror value="{{ old('quantite') }}"/>
            </div>
    </li>
    @error('quantite')
                <span class="helper">{{ $message }}</span>
            @enderror
    <li class="d-flex justify-content-between py-3 ">
        <div class="form-group w-100">
        <label for="quantite">Telephone</label>
        <input type="text" name="telephone" id="telephone" class="form-control w-100 @error('telephone') is-invalid @enderror" style="border:none;border-bottom:2px solid;" placeholder="veuillez entrer votre numero de telephone" maxlength="9" @error('telephone') autofocus @enderror value="{{ old('telephone') }}"/>
        </div>
</li>
@error('telephone')
                <span class="helper">{{ $message }}</span>
            @enderror
<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong><h5 class="font-weight-bold"><span id="som"></span> FrCFA</h5></li>
</ul>
<input type="submit" class="btn btn-dark rounded-pill py-2 btn-black w-100" value="valider la commande">
</form>
</div>
</div>
@endsection
