<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quem somos - Encontre Já</title>
    @if (app()->environment('local'))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('app.css') }}">
        <script src="{{ asset('app.js') }}" defer></script>
    @endif
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    @include('header-default')

    <main class="flex-grow px-4 py-8">
        <h1 class="text-4xl text-center font-bold text-gray-800 mb-6">Sobre Nós</h1>

        <div class="text-center mb-8">
            <p class="text-lg">
                <strong>Encontre Já</strong> é o portal onde você encontra profissionais autônomos de diversas áreas na
                cidade.
                Independente do serviço, nós conectamos você ao profissional certo de forma rápida e eficiente.
            </p>
        </div>

        <section class="max-w-2xl mx-auto mb-12 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">🌟 Nossa Missão</h2>
            <p>
                Ser referência na busca rápida e confiável por profissionais qualificados, proporcionando ao usuário uma
                experiência
                simples, prática e segura. Queremos facilitar a sua vida ao conectar você a serviços que atendam suas
                necessidades.
            </p>
        </section>

        <section class="max-w-2xl mx-auto mb-12 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">👀 Nossa Visão</h2>
            <p>
                Ser a plataforma líder de mercado em busca de profissionais, transformando a maneira como as pessoas
                encontram
                serviços em suas cidades, sempre inovando e se adaptando às necessidades do usuário.
            </p>
        </section>

        <section class="max-w-2xl mx-auto mb-12 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">💡 Nossos Valores</h2>
            <ul class="list-disc list-inside text-left text-gray-700">
                <li>✨ Inovação: Estamos sempre buscando novas soluções para melhorar a experiência do usuário.</li>
                <li>🔍 Transparência: Garantimos informações claras e precisas sobre os profissionais disponíveis.</li>
                <li>🤝 Confiança: Priorizamos a segurança e a qualidade dos serviços oferecidos.</li>
                <li>⚡ Agilidade: Conectamos você rapidamente ao profissional que precisa, sem complicações.</li>
                <li>🌱 Comunidade: Valorizamos a conexão entre profissionais e usuários locais.</li>
            </ul>
        </section>

        <div class="text-center mt-8">
            <p class="text-lg">📧 Para mais informações, entre em contato: <a href="mailto:brayann.barbosa@proton.me"
                    class="text-blue-500 underline">brayann.barbosa@proton.me</a></p>
        </div>
    </main>

    @include('footer-main')

</body>

</html>
