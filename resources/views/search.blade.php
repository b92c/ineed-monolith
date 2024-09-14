<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Resultado da Busca - Ineed</title>

    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-screen">

    @include('header-default')

    <main class="container mx-auto px-4 flex flex-col items-center flex-grow mt-8">

        @if ($professionals->count() === 0)
            <div class="mx-auto flex flex-col items-center text-center p-4 sm:p-8">
                <p class="text-sm sm:text-base">
                    Poxa, não encontramos o que você procura 😥
                    <br> Mas não se preocupe, nossa base de dados é atualizada diariamente, logo logo teremos esse
                    serviço disponível para a sua cidade 😉
                </p>
            </div>
        @else
            <h1 class="text-xl sm:text-2xl lg:text-3xl mb-8 text-center px-2">
                Encontramos <strong>{{ $professionals->count() }}</strong> profissionais que podem te atender 🤩
            </h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full">
                @foreach ($professionals as $professional)
                    <div
                        class="bg-white shadow-md rounded-md p-4 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                        <h2 class="text-lg sm:text-xl mb-2">{{ $professional->first_name }} {{ $professional->last_name }}</h2>
                        <p class="text-sm sm:text-base"><strong>Profissão:</strong> {{ $professional->profession }}</p>
                        {{-- TODO: Abrir phone call --}}
                        <p class="text-sm sm:text-base"><strong>Telefone:</strong> {{ $professional->phone }}</p>
                        {{-- TODO: Abrir mailto --}}
                        <p class="text-sm sm:text-base"><strong>Email:</strong> {{ $professional->email }}</p>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-8 flex justify-center w-full">
            <nav class="flex" aria-label="Pagination">
                <a href="{{ $professionals->previousPageUrl() }}"
                    class="relative inline-flex items-center px-3 sm:px-4 py-2 border border-gray-300 bg-white text-xs sm:text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-l-md focus:z-10 focus:outline-none focus:ring ring-indigo-500 focus:border-indigo-500 disabled:opacity-25 transition ease-in-out duration-150"
                    aria-label="Previous">
                    Anterior
                </a>
                @foreach ($professionals->getUrlRange($professionals->currentPage() - 1, $professionals->currentPage() + 2) as $page => $url)
                    <a href="{{ $url }}"
                        class="{{ $page == $professionals->currentPage() ? 'bg-sky-500 text-white hover:bg-sky-700' : 'bg-white text-gray-700 hover:bg-gray-200' }} relative inline-flex items-center px-3 sm:px-4 py-2 border border-gray-300 text-xs sm:text-sm font-medium focus:z-10 focus:outline-none focus:ring ring-indigo-500 focus:border-indigo-500 transition ease-in-out duration-150">
                        {{ $page }}
                    </a>
                @endforeach
                <a href="{{ $professionals->nextPageUrl() }}"
                    class="relative inline-flex items-center px-3 sm:px-4 py-2 border border-gray-300 bg-white text-xs sm:text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-r-md focus:z-10 focus:outline-none focus:ring ring-indigo-500 focus:border-indigo-500 disabled:opacity-25 transition ease-in-out duration-150"
                    aria-label="Next">
                    Próximo
                </a>
            </nav>
        </div>

    </main>

    @include('footer-main')

    @vite('resources/js/app.js')
</body>

</html>
