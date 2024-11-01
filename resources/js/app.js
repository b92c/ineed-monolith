import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Logic to city select
document.addEventListener('DOMContentLoaded', function () {
    const cityInput = document.getElementById('city');
    const suggestionsContainer = document.getElementById('suggestions');

    cityInput.addEventListener('input', function () {        
        const typedValue = this.value;
        
        if (typedValue.length > 3) {
            fetch('/city')
                .then(response => response.json())
                .then(cities => {
                    suggestionsContainer.innerHTML = '';
                    const resultados = cities.filter(city =>
                        city.city.toLowerCase().includes(typedValue.toLowerCase())
                    );

                    resultados.slice(0, 5).forEach(city => {
                        const option = document.createElement('div');
                        option.textContent = city.city + ' - ' + city.state;
                        option.dataset.id = city.id;
                        option.classList.add('suggestion-item', 'p-2', 'cursor-pointer');

                        option.addEventListener('click', () => {
                            getCity(city);
                        });

                        suggestionsContainer.appendChild(option);
                    });

                    suggestionsContainer.classList.toggle('hidden', resultados.length === 0);
                });
        } else {
            suggestionsContainer.innerHTML = '';
            suggestionsContainer.classList.add('hidden');
        }
    });

    function getCity(city) {
        cityInput.value = city.city;
        suggestionsContainer.innerHTML = '';
        suggestionsContainer.classList.add('hidden');
    }
});
