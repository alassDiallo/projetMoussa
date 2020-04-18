@extends('administrateur.app')
@section('content')
<div class="container">
    <h1 class="text-center">Nombre de {{ Str::plural('categorie',$categories->count()) }} : {{ $categories->count() }}</h1>
    <div class="">
<a  href="{{ route('categorie.create') }}"class="btn btn-success mb-4"><i class="fa fa-plus"></i>Ajouter une categorie</a>
</div>
<div class="card border-info">
    <div class="card-header bg-info" style="color:white;">
        <h4>Liste de categories</h4>
    </div>
    <div class="card-body">
@if(! $categories->isEmpty())
<table class="table table-stripped table text-center">
    <thead>
    <tr>
        <td>N</td>
        <th>Categorie</th>
        <th>Nombre de produit</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
@foreach($categories as $categorie)
<tr>
    <td>{{ $i++ }}</td>
    <td>{{ $categorie->nom }}</td>
    <td class="badge badge-dark">{{ $categorie->produits()->count()}}</td>
<td><a href="{{ route('categorie.show',['categorie'=>$categorie]) }}" class="btn btn-info btn-xs"><i class="fa fa-eye">Voir</i></a></td>
<td><a href="{{ route('categorie.edit',['categorie'=>$categorie]) }}" class="btn btn-success"><i class="fa fa-edit ">Modifier</i></a></td>
<td><form action="{{ route('categorie.destroy',['categorie'=>$categorie]) }}" method="POST" onSubmit="return confirm('etes-vous de vouloire delete cet eleve');">
    @csrf
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-danger" value="Supprimer"><i class="fa fa-trash"></i></button>
    </form>
</td>
</tr>
@endforeach
    </tbody>
</table>
{{ $categories->appends(request()->input())->links() }}
@else
<div class="col-lg-12 alert">
<h1>{{ __("il n'y a pas de categorie enregistrer ") }}</h1>
</div>
@endif
</div>
</div>
</div>
@endsection
