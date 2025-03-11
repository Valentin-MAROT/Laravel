@extends('global-template')
@section('title', 'Accueil')
@section('css')
    <link rel="stylesheet" href="{{ asset('/storage/css/accueil.css') }}">
@endsection
@section('content')
    <div class="container">
        <main>
            <section class="presentation">
                <h1>Bienvenue sur LoL Tournois</h1>
                <p>LoL Tournois est une plateforme de tournois pour le jeu League of Legends. Créez ou rejoignez des tournois, formez des équipes et affrontez-vous pour la victoire !</p>
            </section>

            <section class="best-players">
                <h2>Top 5 meilleurs joueurs</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Position</th>
                            <th>Pseudo</th>
                            <th>Points</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($joueurs as $joueur)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $joueur->username }}</td>
                                <td>{{ $joueur->score }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>

            <section class="tournois">
                <div class="tournois-actuels">
                    <h2>Tournois en cours</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Date</th>
                                <th>Équipes</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tournoisN as $tournoi)
                                <tr>
                                    <td><a href="{{ route('tournoi', $tournoi->id) }}">{{ $tournoi->nom }}</a></td>
                                    <td>{{ date('d/m/Y', strtotime($tournoi->date)) }}</td>
                                    <td>{{ $tournoi->equipes->count() }}</td>
                                    <td>@if($tournoi->date < date('Y-m-d') && $tournoi->dateFin > date('Y-m-d')) En cours @elseif($tournoi->date > date('Y-m-d')) À venir @else Terminé @endif</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tournois-passes">
                    <h2>Tournois passés</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Date</th>
                                <th>Équipes</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tournoisP as $tournoi)
                                <tr>
                                    <td><a href="{{ route('tournoi', $tournoi->id) }}">{{ $tournoi->nom }}</a></td>
                                    <td>{{ date('d/m/Y', strtotime($tournoi->date)) }}</td>
                                    <td>{{ $tournoi->equipes->count() }}</td>
                                    <td>@if($tournoi->date < date('Y-m-d') && $tournoi->dateFin > date('Y-m-d')) En cours @elseif($tournoi->date > date('Y-m-d')) À venir @else Terminé @endif</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
@endsection
