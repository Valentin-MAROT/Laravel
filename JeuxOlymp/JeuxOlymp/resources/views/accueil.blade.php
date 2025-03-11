@extends('base')

@section('title', 'Accueil')

@section('header')
    <div class="titre">
        <h1>Jeux Olympiques</h1>
    </div>
    <div class="menu">
        <nav>
            <a href="{{ route('accueil') }}">Accueil</a>
            <a href="{{ route('jeux') }}">Jeux</a>
            <a href="{{ route('equipes') }}">Equipes</a>
        </nav>
        @if (Auth::check())
            <a href="{{ route('profile') }}">Profil</a>
            <a href="#" onclick="document.getElementById('logout-form').submit();"> Deconnexion</a>
            <form id="logout-form" action="{{ route('deconnexion') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endif
        @if (!Auth::check())
            <a id="connexion" href="{{route('connexion')}}">Connexion</a>
        @endif
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            $('#connexion').click(function() {
                redirect('/connexion');
            });
        });
    </script>
@endpush

@section('content')
    <h2>Accueil</h2>
    <p>Bienvenue sur le site des Jeux Olympiques.</p>
@endsection

@section('footer')
    <p>&copy; 2024 Jeux Olympiques</p>
@endsection