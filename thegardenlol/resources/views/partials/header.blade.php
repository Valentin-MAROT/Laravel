<!-- resources/views/partials/header.blade.php -->
<link rel="stylesheet" href="{{ asset('storage/css/header.css') }}">
<header>
    <div class="logo">LoL Tournois</div>
    <nav>
        <a href="{{ route('accueil') }}">Accueil</a>
        <a href="{{ route('tournois') }}">Tournois</a>
        <a href="{{ route('equipes') }}">Équipes</a>
        <a href="{{ route('joueurs') }}">Joueurs</a>
        <a href="{{ route('contact') }}">Contact</a>
        @if(Auth::check())
            <a href="{{ route('deconnexion') }}">Déconnexion</a>
            <i class="fas fa-user"><a href="{{ route('profile') }}"></a></i>
        @else
            <a href="{{ route('connexion') }}">Connexion</a>
            <a href="{{ route('inscription') }}">Inscription</a>
        @endif
    </nav>
</header>