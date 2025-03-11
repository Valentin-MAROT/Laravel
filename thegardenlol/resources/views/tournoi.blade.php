@extends('global-template')

@section('title')
    Tournoi {{ $tournoi->nom }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('storage/css/tournoi.css') }}">
@endsection

@section('js')
    <script src="{{ asset('storage/js/tournoi.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <main class="tournoi-details">
        <section class="tournoi-info">
            <h1>{{ $tournoi->nom }}</h1>
            <p>Date de début : {{ date('d/m/Y', strtotime($tournoi->date)) }}</p>
            <p>Date de fin : {{ date('d/m/Y', strtotime($tournoi->dateFin)) }}</p>
            <p>Statut : 
                @if($tournoi->date < date('Y-m-d') && $tournoi->dateFin > date('Y-m-d'))
                    En cours
                @elseif($tournoi->date > date('Y-m-d'))
                    À venir
                @else
                    Terminé
                @endif
            </p>
            <p>Nombre d’équipes : {{ $tournoi->equipes->count() }}</p>
        </section>

        <section class="equipes-participantes">
            <h2>Équipes Participantes</h2>
            @if($tournoi->equipes->isEmpty())
                <p>Aucune équipe inscrite pour le moment.</p>
            @else
                <div class="equipes-cards">
                    @foreach($tournoi->equipes as $equipe)
                        <div class="equipe-card">
                            <h3>{{ $equipe->name }}</h3>
                            <p>Membres : {{ $equipe->users->count() }}</p>
                            <a href="{{ route('equipe', $equipe->id) }}">Voir les détails de l'équipe</a>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
        <section class="format-tournoi">
            <h2>Format du Tournoi</h2>
            <p>{{ $tournoi->format }}</p>
            <div class="affichage-tournoi">
                @if($tournoi->format == 'Simple')
                    @foreach($tournoi->rounds as $round)
                        <div class="round">
                            <h3>{{ $round->nom }}</h3>
                            <div class="matches">
                                @foreach($round->plays as $match)
                                    <div class="match">
                                        <p>{{ $match->equipe1->name }} vs {{ $match->equipe2->name }}</p>
                                        <p>{{ $match->score1 }} - {{ $match->score2 }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
    </main>
</div>
@endsection
