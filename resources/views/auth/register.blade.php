<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="first_name" :value="__('Nome')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"
                required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="last_name" :value="__('Sobrenome')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Senha')" />
            <x-text-input id="password" class="block mt-1 w-full pr-10" type="password" name="password" required autocomplete="new-password" minlength="8" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <img id="toggle_password" src="{{ asset('eye-off.png') }}" class="absolute right-3 top-9 cursor-pointer w-6 h-6" alt="Mostrar Senha">
            <div id="password_strength" class="mt-2 h-1 w-full bg-gray-200 rounded">
            <div id="password_strength_bar" class="h-full w-0 rounded"></div>
            </div>
            <p id="password_length_error" class="text-red-500 text-sm mt-2" style="display: none;">A senha deve ter no mínimo 8 caracteres.</p>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 relative">
            <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full pr-10" type="password" name="password_confirmation" required autocomplete="new-password" minlength="8" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            <img id="toggle_password_confirmation" src="{{ asset('eye-off.png') }}" class="absolute right-3 top-9 cursor-pointer w-6 h-6" alt="Mostrar Senha">
        </div>

        <!-- Select Box -->
        <div class="mt-4">
            <x-input-label for="register_services" :value="__('Quero cadastrar meus serviços')" />
            <select id="register_services" name="register_services" class="block mt-1 w-full"
                onchange="toggleServiceFields()">
                <option value="no">Não</option>
                <option value="yes">Sim</option>
            </select>
        </div>

        <!-- Additional Fields -->
        <div id="service_fields" style="display: none;">
            <div class="mt-4">
                <x-input-label for="cpf" :value="__('CPF')" />
                <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf"
                    :value="old('cpf')" />
                <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="profession" :value="__('Profissão')" />
                <x-text-input id="profession" class="block mt-1 w-full" type="text" name="profession"
                    :value="old('profession')" />
                <x-input-error :messages="$errors->get('profession')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="phone" :value="__('Telefone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                    :value="old('phone')" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="address" :value="__('Endereço')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                    :value="old('address')" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="number" :value="__('Número')" />
                <x-text-input id="number" class="block mt-1 w-full" type="text" name="number"
                    :value="old('number')" />
                <x-input-error :messages="$errors->get('number')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="neighborhood" :value="__('Bairro')" />
                <x-text-input id="neighborhood" class="block mt-1 w-full" type="text" name="neighborhood"
                    :value="old('neighborhood')" />
                <x-input-error :messages="$errors->get('neighborhood')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="cep" :value="__('CEP')" />
                <x-text-input id="cep" class="block mt-1 w-full" type="text" name="cep"
                    :value="old('cep')" />
                <x-input-error :messages="$errors->get('cep')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="city" :value="__('Cidade')" />
                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city"
                    :value="old('city')" />
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="state" :value="__('Estado')" />
                <x-text-input id="state" class="block mt-1 w-full" type="text" name="state"
                    :value="old('state')" />
                <x-input-error :messages="$errors->get('state')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Já possui conta?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        // Password Strength
        document.addEventListener('DOMContentLoaded', function () {
            var passwordInput = document.getElementById('password');
            var passwordConfirmationInput = document.getElementById('password_confirmation');
            var togglePassword = document.getElementById('toggle_password');
            var togglePasswordConfirmation = document.getElementById('toggle_password_confirmation');
            var passwordStrengthBar = document.getElementById('password_strength_bar');

            togglePassword.addEventListener('click', function () {
                var type = passwordInput.type === 'password' ? 'text' : 'password';
                passwordInput.type = type;
                this.src = type === 'password' ? '{{ asset('eye-off.png') }}' : '{{ asset('eye-on.png') }}';
            });

            togglePasswordConfirmation.addEventListener('click', function () {
                var type = passwordConfirmationInput.type === 'password' ? 'text' : 'password';
                passwordConfirmationInput.type = type;
                this.src = type === 'password' ? '{{ asset('eye-off.png') }}' : '{{ asset('eye-on.png') }}';
            });

            passwordInput.addEventListener('input', function () {
                var value = passwordInput.value;
                var strength = getPasswordStrength(value);
                updatePasswordStrengthBar(strength);
            });

            function getPasswordStrength(password) {
                var strength = 0;
                var regexes = [
                    /[a-z]/, // letras minúsculas
                    /[A-Z]/, // letras maiúsculas
                    /[0-9]/, // números
                    /[^a-zA-Z0-9]/ // caracteres especiais
                ];

                regexes.forEach(function (regex) {
                    if (regex.test(password)) {
                        strength++;
                    }
                });

                if (password.length >= 8) {
                    strength++;
                }

                return strength;
            }

            function updatePasswordStrengthBar(strength) {
                var colors = ['bg-red-500', 'bg-orange-500', 'bg-green-500'];
                var widths = ['w-1/4', 'w-1/2', 'w-3/4', 'w-full'];

                passwordStrengthBar.className = 'h-full rounded ' + colors[Math.min(strength - 1, 2)];
                passwordStrengthBar.classList.add(widths[Math.min(strength - 1, 3)]);
            }
        });
        
        // CPF Mask
        document.addEventListener('DOMContentLoaded', function() {
            var cpfInput = document.getElementById('cpf');

            cpfInput.addEventListener('input', function(e) {
                var value = e.target.value.replace(/\D/g, '');
                var formattedValue = '';

                if (value.length > 0) {
                    formattedValue = value.substring(0, 3);
                }
                if (value.length > 3) {
                    formattedValue += '.' + value.substring(3, 6);
                }
                if (value.length > 6) {
                    formattedValue += '.' + value.substring(6, 9);
                }
                if (value.length > 9) {
                    formattedValue += '-' + value.substring(9, 11);
                }

                e.target.value = formattedValue;
            });
        });

        // CEP Mask
        document.addEventListener('DOMContentLoaded', function() {
            var cepInput = document.getElementById('cep');

            cepInput.addEventListener('input', function(e) {
                var value = e.target.value.replace(/\D/g, '');
                var formattedValue = '';

                if (value.length > 0) {
                    formattedValue = value.substring(0, 5);
                }
                if (value.length > 5) {
                    formattedValue += '-' + value.substring(5, 8);
                }

                e.target.value = formattedValue;
            });
        });

        // Phone Mask
        document.addEventListener('DOMContentLoaded', function () {
            var phoneInput = document.getElementById('phone');

            phoneInput.addEventListener('input', function (e) {
                var value = e.target.value.replace(/\D/g, '');
                var formattedValue = '';

                if (value.length > 0) {
                    formattedValue = '(' + value.substring(0, 2) + ') ';
                }
                if (value.length > 2) {
                    formattedValue += value.substring(2, 7);
                }
                if (value.length > 7) {
                    formattedValue += '-' + value.substring(7, 11);
                }

                e.target.value = formattedValue;
            });
        });

        function toggleServiceFields() {
            var selectBox = document.getElementById('register_services');
            var serviceFields = document.getElementById('service_fields');
            if (selectBox.value === 'yes') {
                serviceFields.style.display = 'block';
            } else {
                serviceFields.style.display = 'none';
            }
        }
    </script>
</x-guest-layout>
