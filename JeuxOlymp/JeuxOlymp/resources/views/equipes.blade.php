@extends('base')

@section('title', 'Equipes')

@section('header')
    <h1>Jeux Olympiques</h1>
    <nav>
        <a href="{{ route('accueil') }}">Accueil</a>
        <a href="{{ route('jeux') }}">Jeux</a>
        <a href="{{ route('equipes') }}">Equipes</a>
    </nav>
@endsection

@section('content')
    <table id="equipes-table" class="display">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Nombre de joueurs</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipes as $equipe)
                <tr>
                    <td>{{ $equipe->name }}</td>
                    <td>{{ $equipe->description }}</td>
                    <td>1</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('footer')
    <p>&copy; 2020 Jeux Olympiques</p>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#equipes-table').DataTable();
        });
    </script>
@endpush
