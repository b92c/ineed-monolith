<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Quem somos - Ineed</title>

    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-screen">

    @include('header-default')

    <main>
        <h1>Nós somos a revolução</h1>
    </main>

    @include('footer-main')

    @vite('resources/js/app.js')
</body>

</html>
