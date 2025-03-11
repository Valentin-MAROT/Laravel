@extends('global-template')

@section('title', 'Liste des Équipes')
@section('css')
    <link rel="stylesheet" href="{{ asset('storage/css/equipes.css') }}">
@endsection
@section('js')
    <script src="{{ asset('storage/js/equipes.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <!-- Contenu principal -->
    <main>
        <section class="search-filter">
            <h1>Liste des Équipes</h1>
            <div class="filters">
                <input type="text" placeholder="Rechercher une équipe..." id="searchInput" />
            </div>
        </section>

        <section class="equipes-list">
            @if($equipes->isEmpty())
                <p>Aucune équipe disponible pour le moment.</p>
            @else
                <div class="equipes-cards">
                    @foreach($equipes as $equipe)
                        <div class="equipe-card">
                            <h2 data-slug="{{$equipe->slug}}">{{ $equipe->name }}</h2>
                            <p>Membres : {{ $equipe->users->count() }}</p>
                            <a href="{{ route('equipe', $equipe->id) }}">Voir détails</a>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    </main>
</div>
@endsection
