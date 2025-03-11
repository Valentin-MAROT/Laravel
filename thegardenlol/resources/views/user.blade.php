@extends('global-template')

@section('title')
    Utilisateur: {{ $user->username }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('storage/css/user.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $user->username }}</h1>
                <p>{{ $user->email }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Les équipes</h2>
                <ul>
                    @if($equipes == null)
                        <li>Erreur</li>
                    @elseif(count($equipes) == 0)
                        <li>Aucune équipe</li>
                    @else
                        @foreach($equipes as $equipe)
                            <li>
                                <a href="{{ route('equipe', ['id' => $equipe->id]) }}">{{ $equipe->name }}</a>
                                <p>{{ $equipe->tournoi_id }}</p>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="statistiques">
            <div class="row">
                <div class="col-md-12">
                    <h2>Statistiques</h2>
                    <ul>
                        <li>Nombre d'équipes: {{ count($equipes) }}</li>
                        <li>Nombre de victoires: {{ $victoires }}</li>
                    </ul>
                </div>
            </div>
    </div>
@endsection
