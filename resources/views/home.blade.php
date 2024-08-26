<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ineed</title>

    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-screen">

    <header class="">
        <div class="container mx-auto px-4 py-4 flex justify-end items-center space-x-4">
            @if (Route::has('login'))
                <div class="">
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center px-4 py-2 text-sky-800">Fazer login</a>
                </div>
            @endif
    
            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="inline-flex items-center px-4 py-2 rounded-md bg-sky-500 hover:bg-sky-700 text-white">
                    Cadastrar-se
                </a>
            @endif
        </div>
    </header>
    

    <main class="container mx-auto px-4 flex flex-col items-center flex-grow mt-56">
        <div class="flex justify-center items-center">
            <figure>
                <img src="ineed-logo.png" alt="Ineed logo" style="max-height: 10rem; max-width: 10rem">
            </figure>
        </div>
        <div class="text-center">
            <form action="{{ route('search') }}" method="GET" class="flex flex-col items-center">
                <div class="relative flex flex-col items-center mb-4 space-y-4">
                    <!-- Campo para Serviço ou Profissional -->
                    <div class="flex items-center">
                        <input type="text" id="professional" name="professional"
                            class="rounded-md border-gray-300 pl-10 pr-4 py-2 focus:outline-none focus:ring-1 focus:ring-sky-500"
                            placeholder="Qual profissional você procura?" style="width: 20rem;">
                    </div>
                    <!-- Campo para Cidade -->
                    <div class="flex items-center">
                        <input type="text" id="city" name="city"
                            class="rounded-md border-gray-300 pl-10 pr-4 py-2 focus:outline-none focus:ring-1 focus:ring-sky-500"
                            placeholder="Qual é a sua cidade?" style="width: 20rem;">
                    </div>
                    <!-- Botão de Pesquisa -->
                    <button type="submit" class="rounded-md bg-sky-500 hover:bg-sky-700 text-white px-4 py-2">
                        Pesquisar
                    </button>
                </div>
            </form>
        </div>
    </main>

    @include('footer-main')

    @vite('resources/js/app.js')
</body>

</html>
