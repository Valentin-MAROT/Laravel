@extends('global-template')

@section('title', 'Tournois')
@section('css')
    <link rel="stylesheet" href="{{ asset('storage/css/tournois.css') }}">
@endsection

@section('content')
<div class="container">
    <!-- Contenu principal -->
    <main>
        <section class="search-filter">
            <h1>Liste des Tournois</h1>
            <div class="filters">
                <input type="text" placeholder="Rechercher un tournoi..." />
                <select>
                    <option value="all">Tous</option>
                    <option value="en-cours">En cours</option>
                    <option value="terminé">Terminés</option>
                </select>
            </div>
        </section>

        <section class="tournois-list">
                @foreach($tournois as $tournoi)
                    @php
                        $statut = ($tournoi->date < date('Y-m-d') && $tournoi->dateFin > date('Y-m-d')) ? 'en-cours' : (($tournoi->date > date('Y-m-d')) ? 'à-venir' : 'terminé');
                    @endphp
                    <div class="tournoi-card" data-status="{{ $statut }}">
                        <h2>{{ $tournoi->nom }}</h2>
                        <p>Date: {{ date('d/m/Y', strtotime($tournoi->date)) }}</p>
                        <p>Équipes inscrites: {{ $tournoi->equipes->count() }}</p>
                        <p>Statut: @if($statut == 'en-cours') En cours @elseif($statut == 'à-venir') À venir @else Terminé @endif</p>
                        <a href="{{ route('tournoi', $tournoi->id) }}">Voir détails</a>
                    </div>
                @endforeach
        </section>
        <script src="{{ asset('storage/js/tournois.js') }}"></script>
    </main>
</div>
@endsection