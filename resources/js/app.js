import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Logic to select a city
document.addEventListener('DOMContentLoaded', function () {
    const inputCidade = document.getElementById('city');
    const suggestionsContainer = document.getElementById('suggestions');

    inputCidade.addEventListener('input', function () {
        console.log('dentro do input');
        
        const valorDigitado = this.value;

        console.log('valor digitado', valorDigitado);
        
        if (valorDigitado.length > 1) { // Começa a pesquisa após 2 caracteres
            fetch('/cidades')
                .then(response => response.json())
                .then(cidades => {
                    suggestionsContainer.innerHTML = ''; // Limpa sugestões anteriores
                    const resultados = cidades.filter(cidade =>
                        cidade.name.toLowerCase().includes(valorDigitado.toLowerCase())
                    );

                    resultados.forEach(cidade => {
                        const option = document.createElement('div');
                        option.textContent = cidade.name;
                        option.dataset.id = cidade.id; // Armazena o ID da cidade
                        option.classList.add('suggestion-item', 'p-2', 'cursor-pointer');

                        option.addEventListener('click', () => {
                            selecionarCidade(cidade);
                        });

                        suggestionsContainer.appendChild(option);
                    });

                    suggestionsContainer.classList.toggle('hidden', resultados.length === 0); // Mostrar ou esconder
                });
        } else {
            suggestionsContainer.innerHTML = ''; // Limpa sugestões se tiver menos de 2 caracteres
            suggestionsContainer.classList.add('hidden');
        }
    });

    function selecionarCidade(cidade) {
        inputCidade.value = cidade.name; // Atualiza o input com a cidade selecionada
        suggestionsContainer.innerHTML = ''; // Limpa as opções
        suggestionsContainer.classList.add('hidden');
    }
});
