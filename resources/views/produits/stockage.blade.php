@extends('administrateur.app')
@section('content')
{{ $produit->count() }}
{{ $categorie->count() }}
@endsection
