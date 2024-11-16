<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Encontre Já</title>

    @if (app()->environment('local'))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('app.css') }}">
        <script src="{{ asset('app.js') }}" defer></script>
    @endif

</head>

<body class="flex flex-col min-h-screen">

    <header class="">
        <div class="container mx-auto px-4 py-4 flex justify-end items-center space-x-4">

            @auth
                <form action="{{ route('destroy') }}" method="POST" class="inline-flex">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 rounded-md bg-sky-500 hover:bg-sky-700 text-white">
                        Sair
                    </button>
                </form>
            @endauth

            @guest
                @if (Route::has('login'))
                    <div class="">
                        <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 text-sky-800">Fazer
                            login</a>
                    </div>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="inline-flex items-center px-4 py-2 rounded-md bg-sky-500 hover:bg-sky-700 text-white">Cadastrar-se</a>
                @endif
            @endguest

        </div>
    </header>



    <main class="container mx-auto px-4 flex flex-col items-center flex-grow mt-56">
        {{-- Contêiner para a mensagem de sucesso --}}
        <div id="success-message" class="hidden fixed top-4 right-4 bg-green-500 text-white p-4 rounded shadow-lg">
            <span id="success-message-text"></span>
            <button id="close-success-message" class="ml-4 text-white font-bold">X</button>
        </div>

        <div class="flex justify-center items-center">
            <figure>
                <img src="ineed-logo.png" alt="Ineed logo"
                    style="max-height: 5rem;max-width: 20rem;padding-bottom: 0.5rem">
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
                        <input type="text" id="city" name="city" required
                            class="rounded-md border-gray-300 pl-10 pr-4 py-2 focus:outline-none focus:ring-1 focus:ring-sky-500"
                            placeholder="Qual é a sua cidade?" style="width: 20rem;">
                        <div id="suggestions"
                            class="absolute bg-white border border-gray-300 mt-1 rounded-md shadow-lg z-10 hidden">
                        </div>
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

</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = '{{ session('success') }}';
        if (successMessage) {
            var successMessageContainer = document.getElementById('success-message');
            var successMessageText = document.getElementById('success-message-text');
            var closeSuccessMessageButton = document.getElementById('close-success-message');

            successMessageText.textContent = successMessage;
            successMessageContainer.classList.remove('hidden');

            closeSuccessMessageButton.addEventListener('click', function() {
                successMessageContainer.classList.add('hidden');
            });

            setTimeout(function() {
                successMessageContainer.classList.add('hidden');
            }, 3000);
        }
    });
</script>

</html>
