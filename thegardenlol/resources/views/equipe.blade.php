@extends('global-template')

@section('title', 'Détails de l\'Équipe')
@section('css')
    <link rel="stylesheet" href="{{ asset('storage/css/equipe.css') }}">
@endsection

@section('content')
<div class="container">
    <!-- Contenu principal -->
    <main class="equipe-details">
        <section class="equipe-info">
            <div class="image-equipe">
                <img src="{{ asset($equipe->image_url) }}" alt="Logo de l'équipe" width="
                100" height="100">
            </div>
            <div class="title-equipe">
                <h2>{{ $equipe->slug }}</h2>
                <h1>{{ $equipe->name }}</h1>
            </div>
            <div class="description-equipe">
                <p>{{ $equipe->description }}</p>
            </div>
            <div class="infos-equipe">
                {{-- J'ai une table pivot entre les joueurs et les equipes avec un champ role je veux afficher le role du joueur dans l'equipe il peut ne pas y avoir de capitaine mais je recois une erreur si je ne mets pas de condition --}}
                <p>Capitaine : {{ $equipe->users->where('pivot.role', 'capitaine')->first() ? $equipe->users->where('pivot.role', 'capitaine')->first()->username : 'Aucun' }}</p>
                <p>Créée le : {{ $equipe->created_at }}</p>
            </div>
            <p>Nombre de membres : {{ $equipe->users->count() }}</p>
            <p>Infos du tournoi : <a href="{{ route('tournoi', $equipe->tournoi->id) }}">{{ $equipe->tournoi->nom }}</a></p>
        </section>

        <section class="membres-equipe">
            <h2>Membres de l'Équipe</h2>
            @if($equipe->users->isEmpty())
                <p>Aucun membre inscrit pour cette équipe.</p>
            @else
                <ul>
                    @foreach($equipe->users as $membre)
                        <li>
                            <strong>{{ $membre->username }}</strong>
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>
    </main>
</div>
@endsection
