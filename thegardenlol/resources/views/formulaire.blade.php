@extends('global-template')

@section('content')
<link rel="stylesheet" href="{{ asset('storage/css/header.css') }}">
<link rel="stylesheet" href="{{ asset('storage/css/formulaire.css') }}">
<form action="{{ $action }}" method="post" class="formulaire">
    @csrf
    @foreach($fields as $field)
        <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
        <input type="{{ $field['type'] }}" name="{{ $field['name'] }}" id="{{ $field['name'] }}">
    @endforeach
    @if($action === route('connexion'))
        <a href="{{ route('inscription') }}">Pas encore inscrit ?</a>
    @endif
    @if($action === route('inscription'))
        <a href="{{ route('connexion') }}">Déjà inscrit ?</a>
    @endif
    <button type="submit">Envoyer</button>
</form>
@endsection