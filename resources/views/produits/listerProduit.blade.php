@extends('administrateur.app')
@section('content')
<div class="container">
    <h1 class="text-center">Nombre d'{{ Str::plural('article',$produits->count()) }} : {{ $produits->count() }}</h1>
    <div class="">
        <div class="mt-4">
        @foreach(App\Models\Categorie::all() as $categorie)
       <a href="{{ route('listeProduit',['categorie'=>$categorie->slug])}}" class="btn btn-lg btn-info mt-4 mb-4"> {{ $categorie->nom  }}</a>
        @endforeach
        </div>
<a  href="{{ route('produits.create') }}"class="btn btn-success mb-4"><i class="fa fa-plus"></i>Ajouter un article</a>

</div>

        <h4>Liste des articles  {{ request()->categorie?' de la categorie '.request()->classe : "" }}</h4>
@if(! $produits->isEmpty())
<table class="table table-stripped table text-center">
    <thead>
    <tr>
        <td>N</td>
        <th>Titre</th>
        <th>qualite</th>
        <th>Prix</th>
        <th>quantite</th>
        <th>image</th>
        <th>categorie</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
@foreach($produits as $produit)
<tr>
    <td>{{ $i++ }}</td>
    <td>{{ $produit->titre }}</td>
    <td>{{ $produit->qualite}}</td>
    <td>{{ $produit->prix}}</td>
    <td>{{ $produit->quantite}}</td>
    <td>{{ $produit->image}}</td>
    <td>{{ $produit->categorie->nom}}</td>
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
{{ $produits->appends(request()->input())->links() }}
@else
<div class="col-lg-12 alert">
<h1>{{ __('Cette classe ne contient pas d\'produit ') }}</h1>
</div>
@endif
</div>
</div>
</div>
@endsection
