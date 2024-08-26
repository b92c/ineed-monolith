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
        <h1 class="text-3xl text-center font-bold mb pt-4">Sobre nós</h1>

        <div class="text-center">
            <p>
                <strong>Ineed</strong> é um site para encontrar os profissionais que você precisa.
            </p>
        </div>
    </main>

    @include('footer-main')

    @vite('resources/js/app.js')
</body>

</html>
