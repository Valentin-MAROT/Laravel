<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('storage/css/global-template.css') }}">
    @yield('css')
    @yield('js')
    <title>@yield('title')</title>
</head>
<body>
    @include('partials.header')
    @foreach($errors->all() as $error)
        <p class="errors">{{ $error }}</p>
    @endforeach
    @yield('content')
    <div class="push"></div>
    @include('partials.footer')
</body>
</html>