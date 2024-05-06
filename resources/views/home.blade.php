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
        <div class="container mx-auto px-4 py-4 flex justify-end items-center">
            @if (Route::has('login'))
                <div class="">
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center px-4 py-2 rounded-full bg-sky-500 hover:bg-sky-700 text-white">Login</a>
                </div>
            @endif

            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="inline-flex items-center px-4 py-2 rounded-full bg-sky-500 hover:bg-sky-700 text-white">
                    Registrar-se
                </a>
            @endif
        </div>
    </header>

    <main class="container mx-auto px-4 flex flex-col items-center flex-grow mt-48">
        <div class="text-center">
            <h1 class="text-3xl font-bold mb-8">Ineed</h1>
            <form action="{{ route('search') }}" method="GET" class="flex flex-col items-center">
                <div class="relative flex items-center mb-4">
                    <input type="text" id="q" name="q"
                        class="rounded-md border-gray-300 pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Pesquisar pelo serviço">
                    <button type="submit" class="ml-2 rounded-md bg-sky-500 hover:bg-sky-700 text-white px-4 py-2">
                        Pesquisar
                    </button>
                </div>
            </form>
        </div>
    </main>

    <hr class="border-gray-200 my-8">

    <footer class="text-center py-4">
        &copy; {{ date('Y') }} Built with pride by <a href="https://github.com/Bbarbosa7" target="_blank"
            class="text-indigo-600 hover:underline">Bbarbosa7</a>
        supported by PHP v{{ PHP_VERSION }}
    </footer>

    @vite('resources/js/app.js')
</body>

</html>
