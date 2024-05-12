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
        <h1 class="text-3xl font-bold mb-8">Resultado da Busca</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- TODO: Melhorar a lógica de exibição de profissionais --}}
            @if ($professionals->count() === 0)
            <div class="mx-auto flex flex-col items-center">
                <p class=""><strong>Nenhum profissional encontrado</strong></p>
            </div>
            @endif

            @foreach ($professionals as $professional)
            <div class="bg-white shadow-md rounded-md p-4 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                <h2 class="text-xl font-semibold mb-2">{{ $professional->name }}</h2>
                <p><strong>Profissão:</strong> {{ $professional->profession }}</p>
                <p><strong>Preço do Serviço:</strong> R$ {{ number_format($professional->service_price, 2, ',', '.') }}</p>
                <p><strong>Cobra por:</strong>  {{ $professional->charges_by }} </p>
                <p><strong>Telefone:</strong>  {{ $professional->phone }} </p>
                <p><strong>Email:</strong>  {{ $professional->email }} </p>
            </div>
            @endforeach
        </div>

        <div class="mt-8 flex justify-center">
            <nav class="flex" aria-label="Pagination">
                <a href="{{ $professionals->previousPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-l-md focus:z-10 focus:outline-none focus:ring ring-indigo-500 focus:border-indigo-500 disabled:opacity-25 transition ease-in-out duration-150"
                    aria-label="Previous">
                    Anterior
                </a>
                @foreach ($professionals->getUrlRange($professionals->currentPage()-1, $professionals->currentPage()+2) as $page => $url)
                    <a href="{{ $url }}"
                        class="{{ $page == $professionals->currentPage() ? 'bg-sky-500 text-white hover:bg-sky-700' : 'bg-white text-gray-700 hover:bg-gray-200' }} relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring ring-indigo-500 focus:border-indigo-500 transition ease-in-out duration-150">
                        {{ $page }}
                    </a>
                @endforeach
                <a href="{{ $professionals->nextPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-r-md focus:z-10 focus:outline-none focus:ring ring-indigo-500 focus:border-indigo-500 disabled:opacity-25 transition ease-in-out duration-150"
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
