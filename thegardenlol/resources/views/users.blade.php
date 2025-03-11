@extends('global-template')

@section('title', 'Liste des Utilisateurs')

@section('css')
    <link rel="stylesheet" href="{{ asset('storage/css/users.css') }}">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" />
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>    
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('storage/js/users.js') }}"></script>
@endsection


@section('content')
<div class="container">
    <!-- Contenu principal -->
    <main class="users-list">
        <section class="users-list">
            <table id="users" class="display">
                <thead>
                    <tr>
                        <th>Nom d'utilisateur</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><a href="{{ route('joueur', ['id' => $user->id]) }}">{{ $user->username }}</a></td>
                            <td>{{ $user->score }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
</div>
@endsection
