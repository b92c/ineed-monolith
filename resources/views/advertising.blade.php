<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Publicidade - Encontre Já</title>

    @if (app()->environment('local'))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('app.css') }}">
        <script src="{{ asset('app.js') }}" defer></script>
    @endif

</head>

<body class="flex flex-col min-h-screen">

    @include('header-default')

    <main>
        <h1>Junte-se a revolução</h1>
    </main>

    @include('footer-main')

</body>

</html>
