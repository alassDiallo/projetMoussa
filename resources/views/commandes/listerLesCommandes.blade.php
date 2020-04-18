@extends('administrateur.app')
@section('content')
<div class="container">
    <h1 class="text-center">Nombre de {{ Str::plural('commande',$commandes->count()) }} : {{ $commandes->count() }}</h1>
    <div class="">
<a  href="{{ route('commande.create') }}"class="btn btn-success mb-4"><i class="fa fa-plus"></i>Ajouter une commande</a>

</div>
        <h4>Liste des commandes</h4>
@if(! $commandes->isEmpty())
<table class="table table-stripped table text-center">
    <thead>
    <tr>
        <th>N</th>
        <th>numero</th>
        <th>telephone client</th>
        <th>Nom produit</th>
        <th>Prix unitaire</th>
        <th>quantite commander</th>
        <th>montant commande</th>
        <th>Etat Commande</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
@foreach($commandes as $commande)
<tr>
    <td>{{ $i++ }}</td>
    <td>{{ $commande->numeroCommande }}</td>
    <td>{{ $commande->telephoneClient }}</td>
    @foreach($commande->produits as $produit)
    <td>{{ $produit->titre }}</td>
    <td>{{ $produit->prix}}</td>
    <td>{{ $produit->pivot->quantiteCommande }}</td>
    <td>{{ $produit->pivot->montant }}</td>
    <td><span class="badge badge-{{ getEtat($commande->etat) }}">{{ $commande->etat == 0?'en attente':'valider' }}</td>
    @endforeach
<td><a href="{{ route('commande.show',['commande'=>$commande]) }}" class="btn btn-info btn-xs"><i class="fa fa-eye">Voir</i></a></td>
<td><a href="{{ route('commande.edit',['commande'=>$commande]) }}" class="btn btn-success"><i class="fa fa-edit ">Modifier</i></a></td>
<td><form action="{{ route('commande.destroy',['commande'=>$commande]) }}" method="POST" onSubmit="return confirm('etes-vous de vouloire delete cet commande');">
    @csrf
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-danger" value="Supprimer"><i class="fa fa-trash"></i></button>
    </form>
</td>
</tr>
@endforeach
    </tbody>
</table>
{{ $commandes->appends(request()->input())->links() }}
@else
<div class="col-lg-12 alert">
<h1>{{ __("il n'y a pas de commandes") }}</h1>
</div>
@endif
</div>
</div>
</div>
@endsection
